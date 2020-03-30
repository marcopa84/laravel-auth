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
@endsection