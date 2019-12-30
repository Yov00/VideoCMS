<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;;
class VideoController extends Controller
{
    

    public function index()
    {
        return view('videos.index')->with('videos',Video::all());
    }

    public function create()
    {
        return view('videos.upload');
    }

    public function store(Request $request)
    {
        $path = $request->video->store('videos');
        $id = Auth()->user()->id;
        Video::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'video'=>$path,
            'user_id'=>$id,


        ]);

        return redirect('/');
    }


    public function show($id)
    {
        return view('videos.show')->with('video',Video::find($id));
    }

}

