<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Matiere;
use Carbon\Traits\Date;
use Doctrine\DBAL\Query;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplineController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFormDiscipline(){
        $matieres = Matiere::all();

        return view('form-discipline', [
            'matieres' => $matieres
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createDiscipline(Request $request) {
        $code = $request->input('code');
        $libelle = $request->input('libelle');
        $matiere = $request->input('matiere');

        $discipline = Discipline::create([
            'code' => $code,
            'libelle' => $libelle
        ]);

        if (!empty($matiere)){
            DB::table('discipline_matiere')->insert([
                'id_discipline' => $discipline->id,
                'id_matiere' => $matiere,
                'created_at' => \date('Y-m-d H:i:s'),
                'updated_at' => \date('Y-m-d H:i:s'),
            ]);
        }

        return redirect('/disciplines');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getDisciplines(Request $request){
        $criteria = $request->input('s');

        $disciplines = Discipline::Sortable()
            ->where('code', 'LIKE', '%' . $criteria . '%')
            ->orWhere('libelle', 'LIKE', '%' . $criteria . '%')
            ->orderBy('libelle')
            ->get();

        $query = [
            's' => $criteria
        ];

        return view('disciplines', ['disciplines' => $disciplines->paginate(10, null, null, 'page', $query)]);
    }
}
