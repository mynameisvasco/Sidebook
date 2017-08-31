<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Like;

class StoriesController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        //Create Story
        $story = new Story;
        $story->title = $request->input('title');
        $story->body = $request->input('body');
        $story->user_id = auth()->user()->id;
        $story->save();

        return redirect('/mystories')->with('success', 'Your story was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);
        $like = Like::where('story_id', $story->id)->get();
        $num_likes = count($like);
        return view('stories.index')->with('story',$story)->with('like',$like)->with('num_likes',$num_likes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story = Story::find($id);

        //Check for correct user
        if(auth()->user()->id != $story->user_id){
            return redirect('/');
        }

        return view('stories.edit')->with('story',$story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        
        //Update Story
        $story = Story::find($id);

         //Check for correct user
        if(auth()->user()->id != $story->user_id){
            return redirect('/');
        }

        $story->title = $request->input('title');
        $story->body = $request->input('body');
        $story->save();

        return redirect('/mystories')->with('success', 'Your story was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);

        //Check for correct user
        if(auth()->user()->id != $story->user_id){
             return redirect('/');
        }

        $story->delete();
        return redirect('/mystories')->with('success','Your story was deleted');
    }
}
