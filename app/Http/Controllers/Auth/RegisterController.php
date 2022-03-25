<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->symbols()
            ],
            // 'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $image = '';
        if(isset($data['image']) and !empty($data['image'])){
            $file = $data['image'];// รับ value จาก input file
            // $destinationPath = storage_path();// get path folder storage
            $destinationPath = "./assets/images/users/";// get path asset

            $strPos = strpos($file->getMimeType(),"/");
            $type = substr($file->getMimeType(), $strPos+1);

            $nameFile = date('YmdHis').".".$type;
            $file->move($destinationPath, $nameFile); // upload file ด้วยชื่อใหม่ ไปยัง path ที่กำหนด
            $image = $nameFile;
        }
        $socialMedie = '';
        if(isset($data['social_media']) and !empty($data['social_media'])){
            $socialMedie = implode(",",$data['social_media']);
        }
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'image' => $image,
            'gender' => $data['gender'],
            'social_media' => $socialMedie,
            'birthdate' => $data['birthdate'],
            'password' => Hash::make($data['password']),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
