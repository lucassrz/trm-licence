<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function users(Request $request): View
    {
        $users = User::sortable(
            function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('name', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }
        )->paginate(10);
        
        return view('users', ['users'=>$users]);
    }
}
