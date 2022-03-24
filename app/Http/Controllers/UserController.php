<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Helper;

class UserController extends Controller
{
    public function index()
    {
        session([ 'active-Menu' => 'users-index']);
        $users = User::where('deleted_at',null)->get();
        return view('user.index',compact(
            'users'
        ));
    }
}
