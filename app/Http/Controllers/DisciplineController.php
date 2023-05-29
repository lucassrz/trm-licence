<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFormDiscipline(){
        return view('form-discipline');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createDiscipline(Request $request) {
        $code = $request->input('code');
        $libelle = $request->input('libelle');

        Discipline::create([
            'code' => $code,
            'libelle' => $libelle
        ]);

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
