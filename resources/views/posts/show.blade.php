@extends('layouts.app')

@section('content')

    <table class="table">
      <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>User</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td><a class="btn btn-primary" href="{{route('posts.index')}}">Back</a></td>
        </tr>
      </tbody>
    </table>
  
    <table class="table">
      <thead>
        <tr>
            <th>Name</th>
            <th>Comment</th>
            <th>Created at</th>
           
        </tr>
      </thead>
      <tbody>
        @foreach ($post->comments as $comment)
         <tr>
             <td>{{$comment->name}}</td>
             <td>{{$comment->body}}</td>
             <td>{{$comment->created_at}}</td>   
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection