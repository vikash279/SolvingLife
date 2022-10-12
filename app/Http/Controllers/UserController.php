<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        return view('admin.index');
    }

    public function allUsers(Request $request){
        return view('admin.allusers');
    }

    public function addUsers(Request $request){
        return view('admin.addusers');
    }
}
