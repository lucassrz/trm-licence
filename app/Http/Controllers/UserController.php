<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

     public function users(Request $request): View {

         $criteria = $request->input('s');

         $users = DB::table('users')
                        ->where('name', 'LIKE', '%' . $criteria . '%')
                        ->orWhere('email', 'LIKE', '%' . $criteria . '%')
                        ->get();

        /* $query = User::query()->where('name', 'LIKE', '%' . $criteria . '%')
                              ->where('email', 'LIKE', '%' . $criteria . '%')
                              ->sortable()->paginate(10); */
                              
         /* $users = User::sortable( 

            function ($query) use ($request) {

                    $query->where('name', 'LIKE', '%' . $s . '%')
                          ->orWhere('email', 'LIKE', '%' . $s . '%')
                          ->get();
            }

        )->paginate(10); */

        
        return view('users', ['users'=>$users->paginate(10)]);
    }

} 
