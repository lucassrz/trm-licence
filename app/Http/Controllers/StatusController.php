<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function getFormStatus() {
        return view('form-status');
    }

    public function createStatus(Request $request) {
        $libelle = $request->input('libelle');
        $value = $request->input('value');

        Status::create([
            'libelle' => $libelle,
            'value' => $value
        ]);

        return redirect('/status');
    }

    public function getStatus(Request $request) {
        $criteria = $request->input('s');

        $status = Status::Sortable()
            ->where('libelle', 'LIKE', '%' . $criteria . '%')
            ->orWhere('value', '=', $criteria)
            ->orderBy('libelle')
            ->get();

        $query = [
            's' => $criteria
        ];

        return view('status', ['status' => $status->paginate(10, null, null, 'page', $query)]);
    }
}
