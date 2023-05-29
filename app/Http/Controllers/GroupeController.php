<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
     /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFormGroupe(){
        return view('form-groupe');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createGroupe(Request $request) {
        $matiere = $request->input('matiere');
        $enseignant = $request->input('enseignant');

        Groupe::create([
            'id_matiere' => $matiere,
            'id_enseignant' => $enseignant
            
        ]);

        return redirect('/groupes');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getGroupes(Request $request){
        $criteria = $request->input('s');

        $groupes = Groupe::Sortable()
            ->where('id_matiere', 'LIKE', '%' . $criteria . '%')
            ->OrWhere('id_enseignant', 'LIKE', '%' . $criteria . '%')
            ->orderBy('id_matiere')
            ->get();

        $query = [
            's' => $criteria
        ];

        return view('groupes', ['groupes' => $groupes->paginate(10, null, null, 'page', $query)]);
    }
}
