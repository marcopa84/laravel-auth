@extends('layouts.app')

@section('content')

    <div>
        <h1> {{Auth::user()->name}}'s Posts List</h1>     
      <a class="btn btn-primary" href="{{route('registred.posts.create')}}">Crea un nuovo post</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>User Id</th>
          <th>User Name</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th colspan="3"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->user_id}}</td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->updated_at}}</td>
          <td><a class="btn btn-primary" href="{{route('registred.posts.show', $post->slug)}}">View</a> </td>
          <td><a class="btn btn-success" href="{{route('registred.posts.edit', $post->id)}}">Edit</a> </td>
          <td>
          <form action="{{route('registred.posts.destroy', $post)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>  
            </form>
            
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
@endsection