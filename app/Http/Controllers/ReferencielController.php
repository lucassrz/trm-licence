<?php

namespace App\Http\Controllers;

use App\Models\Referenciel;
use Illuminate\Http\Request;

class ReferencielController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFormReferenciel(){
        return view('form-referenciel');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createReferenciel(Request $request) {
        $libelle = $request->input('libelle');
        $annees = $request->input('annees');
        $niveau = $request->input('niveau');

        Referenciel::create([
            'libelle' => $libelle,
            'annees' => $annees,
            'niveau' => $niveau
        ]);

        return redirect('/referenciels');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getReferenciels(Request $request){
        $criteria = $request->input('s');

        $referenciels = Referenciel::Sortable()
            ->where('libelle', 'LIKE', '%' . $criteria . '%')
            ->orWhere('annees', 'LIKE', '%' . $criteria . '%')
            ->orWhere('niveau', 'LIKE', '%' . $criteria . '%')
            ->orderBy('libelle')
            ->get();

        $query = [
            's' => $criteria
        ];

        return view('referenciels', ['referenciels' => $referenciels->paginate(10, null, null, 'page', $query)]);
    }
}