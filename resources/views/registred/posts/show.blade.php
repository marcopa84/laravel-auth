@extends('layouts.app')

@section('content')

    <div>
        <h1> {{Auth::user()->name}}'s Post</h1>     
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Body</th>
          <th>User Name</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->body}}</td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->updated_at}}</td>
          <td><a class="btn btn-success" href="{{route('registred.posts.edit', $post)}}">Edit</a> </td>
          <td>
          <form action="{{route('registred.posts.destroy', $post)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>  
            </form>
            
          </td>
        </tr>
        
      </tbody>
    </table>
@endsection