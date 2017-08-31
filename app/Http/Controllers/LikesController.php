<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Like;
use App\User;

class LikesController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function like(Request $request)
    {
        $this->validate($request,[
            'story_id' => 'required'
        ]);

        //Like
        $like = new Like;
        $like->user_id = auth()->user()->id;
        $like->story_id = $request->input('story_id');
        $like->like = true;
        $like->save();

        //Add like number to story
        $add_like = Story::find($like->story_id);
        $add_like->likes += 1;
        $add_like->save();

        return redirect('/stories/'.$like->story_id);

    }

    public function unlike(Request $request)
    {

        $story_id = $request->story_id;
        
        //Unlike
        $like = Like::where('user_id', auth()->user()->id)->where('story_id', $story_id)->delete();
        
        //Remove like number to story
        $remove_like = Story::find($story_id);
        $remove_like->likes -= 1;
        $remove_like->save();

        return redirect('/stories/'.$story_id);
        
    }
}