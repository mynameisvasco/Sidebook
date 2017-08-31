<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MystoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_page = 'mystories';
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('mystories')->with('stories', $user->stories)->with('active_page', $active_page);
    }
}
