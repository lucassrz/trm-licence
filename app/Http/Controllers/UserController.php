<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {

     public function users(Request $request): View {

         $criteria = $request->input('s');

         $users = User::sortable()
                        ->where('name', 'LIKE', '%' . $criteria . '%')
                        ->orWhere('email', 'LIKE', '%' . $criteria . '%')
                        ->get();

        $query = [
            's' => $criteria
        ];

        return view('users', ['users'=>$users->paginate(10, null, null, 'page', $query)]);
    }

} 
