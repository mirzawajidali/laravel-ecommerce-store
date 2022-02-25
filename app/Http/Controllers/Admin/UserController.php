<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //User list
    public function users()
    {
        $user = User::with('role')->get();
        dd($user);
    }
}