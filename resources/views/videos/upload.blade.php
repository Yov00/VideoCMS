@extends('layouts.layout-main')

@section('title')
    Upload
@endsection


@section('content')
    <div class="container col-md-4 my-5">
        <h3>Upload Video</h3>
        <form  action="{{ route('video.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                  <br>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Desciption:</label>
                  <br>
                <textarea name="description" id="description" class="form-control"> </textarea>
            </div>
            <div class="form-group">
                <label for="video">Video:</label>
                  <br>
                <input type="file" name="video" id="video" class="form-control">
            </div>
           <button type="submit" class="btn btn-primary col-md-12">Upload</button> 
        </form>
    </div>
@endsection