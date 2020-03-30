  
@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <form action="{{route('registred.posts.update', $post)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="{{$post->title}}">
        </div>

        <div class="form-group">
          <label for="body">Body</label>
        <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{$post->body}}</textarea>
        </div>
        <button class="btn btn-success" type="submit">Save</button>
      </form>
    </div>
  </div>
    
@endsection