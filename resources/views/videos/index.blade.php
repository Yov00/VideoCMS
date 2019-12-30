@extends('layouts.layout-main')

@section('title')
    Home
@endsection

@section('content')
  

<div class="container" style="margin-top:20px">
<h4 class="my-10">Recommended</h4>
</div>
    <div id="video-container">
        
        @foreach ($videos as $video)

        <div class="video-wrapper">
            <a href="{{ route('video.show',$video->id) }}">
        <div class="video">
         <video width="200" height="120" >
            <source src=" {{ asset('storage/'.$video->video) }}" type="video/mp4">
            <source src=" {{ asset('storage/'.$video->video) }}" type="video/ogg">
            Your browser does not support the video tag.
          </video>
        </div>
        </a>
        <div class="row" style="margin-top:10px">
            <div class="col-md-3">
                <img src="{{ Gravatar::get($video->user->email) }}" alt="" class="gravatar-img"/>

            </div>  
        <div class="col-md-9">
            <a href="{{ route('video.show',$video->id) }}">
               <p style="font-weight:bold;font-size:.8em">{{ $video->title }}</p>
            </a>
         </div>
        
      
         </div>
    </div>

    @endforeach
   </div>

@endsection