<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFormMatiere(){
        return view('form-matiere');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createMatiere(Request $request) {
        $libelle = $request->input('libelle');

        Matiere::create([
            'libelle' => $libelle
        ]);

        return redirect('/matieres');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getMatieres(Request $request){
        $criteria = $request->input('s');

        $matieres = Matiere::Sortable()
            ->where('libelle', 'LIKE', '%' . $criteria . '%')
            ->orderBy('libelle')
            ->get();

        $query = [
            's' => $criteria
        ];

        return view('matieres', ['matieres' => $matieres->paginate(10, null, null, 'page', $query)]);
    }
}