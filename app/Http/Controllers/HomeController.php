<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::getUsers('');
        return view('pages.home')->with('users', $users);
    }

    public function getMoreUsers(Request $request) 
    {
        $query = $request->search_query;
        if($request->ajax()) {
            $users = User::getUsers($query);
            return view('pages.user_data', compact('users'))->render();
        }
    }
}