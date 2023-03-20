<?php
namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ClasseController extends Controller {

    public function index(Request $request): View {

        $criteria = $request->input('s');

        $classes = Classe::sortable()
            ->where('libelle', 'LIKE', '%' . $criteria . '%')
            ->orWhere('id_referenciel', 'LIKE', '%' . $criteria . '%')
            ->with(['etablissement'])->get();

        $query = [
            's' => $criteria
        ];

        return view('classe_index', ['classes'=>$classes->paginate(10, null, null, 'page', $query)]);
    }

}