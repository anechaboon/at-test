<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Helper;
use DB;
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

    public function searchUser()
    {
        $response['data'] = null;
        $search = $_POST['search'];
        $order = $_POST['order'];
        $sql = "SELECT * FROM users 
                WHERE name LIKE '%$search%' or 
                    lastname LIKE '%$search%' or
                    email LIKE '%$search%' or
                    email LIKE '%$search%'
                ORDER BY birthdate $order
                    ";
        $result = DB::select($sql);
        if($result){
            $response['data'] = $result;

        }
        return $response;
    }
}
