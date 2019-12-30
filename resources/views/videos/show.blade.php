@extends('layouts.layout-main')


@section('title')
    {{ $video->title }}
@endsection


@section('content')



        <div class="video-show" style="width:100%;height:50vh">
            <video width="100%" height="100%" controls>
                <source src=" {{ asset('storage/'.$video->video) }}" type="video/mp4">
                <source src=" {{ asset('storage/'.$video->video) }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>
<div class="video-info-wrapper">

    <div class="video-show-info">


        <div class="video-show-title">
            <h4 style="font-family: 'Poppins', sans-serif;">
                {{ $video->title }}
            </h4>
        </div>
        <div class="video-show-description">
            <p>
                {{ $video->description }}
        
            </p>
        </div>
        <div style="margin-top:50px;">
            @guest
            <a class="btn btn-primary centered" href="{{ route('login') }}">
                Login to post a comment
            </a>
            @else
            <form action="{{ route('comments.store',$video->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment" style="font-size:bold;">Comment:</label>
                    <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">
                        Submit
                    </button>
                </div>
            </form>
         @endguest
        </div>
        <div style="margin-top:50px;">
            
           
            
            
            
         
            @foreach ($video->comments as $comment)
                <div class="user">
                    <div class="user__info">
                        <div class="user__image">
                            <img src="{{ Gravatar::get($comment->author->email) }}" alt="" class="gravatar-img"/>
                        </div>
                        <div class="user__name">
                            {{  $comment->author->name}}
                        </div>
                    </div>
                    <div class="user__comments">
                        {{ $comment->content }}
                    </div>
                    <div class="comments__likeBar">
                        <span class="comments__like">
                            <i class="fas fa-thumbs-up"></i>
                        </span>
                        <span class="comments_likesNumber">20</span>
                        <span class="comments__dislike">
                         <i class="fas fa-thumbs-down"></i>
                        </span>
                    </div>
                </div>
            @endforeach
        
        </div>

    </div>

    <div class="video-show-more-videos">
      
      @foreach( $video->author->videos as $video)
  
            <div style="display:flex;margin:10px 0;width:100%;">
            
                <div style="width:50%;padding:0;">
                    <a href="{{ route('video.show',$video->id) }}">
                    <video width="100%" height="120px" style="background-color:black;">
                        <source src=" {{ asset('storage/'.$video->video) }}" type="video/mp4">
                        <source src=" {{ asset('storage/'.$video->video) }}" type="video/ogg">
                        Your browser does not support the video tag.
                        </video>
                    </a>
                    </div>
                <div style="width:50%;padding:0px 5px;">
                    <a class="link-hover-underline-disable" href="{{ route('video.show',$video->id) }}" style="color:black;">
                        <p style="font-size:14px;">{{ $video->title }}</p>
                    </a>
                    <a class="link-hover-underline-disable" href="{{ route('video.show',$video->id) }}" style="color:black;">
                        <p style="text-transform:capitalize;color:gray;font-family:cursive;">{{ $video->author->name }}</p>
                    </a>
                    </div>
                
    
            </div>
     
      @endforeach
    </div>

</div>
@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

@endsection