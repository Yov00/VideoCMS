<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Video;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request,$id)
    {
           
        Comment::create([
            'content'=>$request->comment,
            'user_id'=>Auth()->user()->id,
            'video_id'=>$id,
        ]);

        return back();
    }
}
