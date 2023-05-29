<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFormEnseignant() {
        return view('form-enseignant');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createEnseignant(Request $request){
        $name = $request->input('name');
        $firstname = $request->input('firstname');
        $discipline = $request->input('discipline');
        $statut = $request->input('status');

        Enseignant::create([
            'id_etablissement' => 1,
            'id_discipline' => $discipline,
            'nom' => $name,
            'prenom' => $firstname,
            'id_status' => $statut
        ]);

        return redirect('/enseignants');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getEnseignants(Request $request) {
        $criteria = $request->input('s');

        $enseignants = Enseignant::sortable()
            ->where('nom', 'LIKE', '%' . $criteria . '%')
            ->orWhere('prenom', 'LIKE', '%' . $criteria . '%')
            ->orderBy('nom')
            ->get();

        $query = [
            's' => $criteria
        ];
        return view('enseignants', ['enseignants'=>$enseignants->paginate(10, null, null, 'page', $query)]);
    }
}
