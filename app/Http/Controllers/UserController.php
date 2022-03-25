<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Helper;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @desc User List
     */
    public function index()
    {
        session([ 'active-Menu' => 'user-index']);
        $users = User::where('deleted_at',null)->get();
        return view('user.index',compact(
            'users'
        ));
    }

    /**
     * @desc Profile Page
     */
    public function profile($id)
    {
        session([ 'active-Menu' => 'user-profile']);
        $user = User::where('deleted_at',null)
            ->where('id',$id)
            ->first();
        return view('user.profile',compact(
            'user'
        ));
    }
}
