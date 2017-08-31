<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Like;

class PagesController extends Controller
{
    function home(){

        $active_page = 'home';
        $stories = Story::orderBy('likes','desc')->take(3)->get();
        return view('home')->with('stories',$stories)->with('active_page',$active_page);
        
    }

    function discover(){

        $active_page = 'discover';

    }
}
