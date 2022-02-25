<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    //Login
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('admin.auth.login', $data);
    }
    //User Login
    public function user_login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            //Error
            return response()->json([
                'status' => '404',
                'message' => $validation->getMessageBag()
            ]);
        } else {
            //Success
            $username = User::where('username', $request->username)->first();
            $user_role = User::find($username['id'])->role;
            if ($username) {
                if (Hash::check($request->password, $username['password'])) {
                    if ($username['is_active'] == 0) {
                        return response()->json([
                            'status' => '500',
                            'message' => 'You are not active anymore!'
                        ]);
                        exit();
                    }
                    if ($user_role['is_admin'] == 0) {
                        return response()->json([
                            'status' => '500',
                            'message' => 'Sorry, You are not a admin!'
                        ]);
                        exit();
                    }
                    if ($user_role['is_admin'] == 1) {
                        $request->session()->put('loggedUser', $username['id']);
                        return response()->json([
                            'status' => '200',
                            'message' => 'Welcome back!'
                        ]);
                    }
                } else {
                    //Error
                    return response()->json([
                        'status' => '500',
                        'message' => 'Invalid Username or Password!'
                    ]);
                }
            } else {
                //Error
                return response()->json([
                    'status' => '500',
                    'message' => 'Invalid Username or Password!'
                ]);
            }
        }
    }
    //Logout
    public function logout()
    {
        if (Session::has('loggedUser')) {
            Session::pull('loggedUser');
            return redirect('/admin');
        }
    }


    //Register
    public function register()
    {
        // $user = new User();
        // $user->username = "user";
        // $user->firstname = "user";
        // $user->lastname = "user";
        // $user->email = "user@gmail.com";
        // $user->password = Hash::make('12345');
        // $user->is_active = 1;
        // $user->phone = "123456";
        // $role = new Role();
        // $role->name = "user";
        // $role->user_id = 2;
        // $role->is_admin = 0;
        // $user->save();
        // $user->role()->Save($role);
    }
}