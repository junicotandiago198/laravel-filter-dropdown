<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::getUsers();
        return view('pages.home')->with('users', $users);
    }

    public function getMoreUsers(Request $request) 
    {
        if($request->ajax()) {
            $users = User::getUsers();
            return view('pages.user_data', compact('users'))->render();
        }
    }
}