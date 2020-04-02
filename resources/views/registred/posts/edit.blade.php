  
@extends('layouts.app')
@section('content')

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

        <div class="form-group">
          <label for="tags">Tags</label>
          <ul class="list-inline">
          @foreach ($tags as $tag)
          <li class="list-inline-item">
            <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{($post->tags->contains($tag->id)) ? 'checked' : ''}}>
            <span>{{$tag->description}}</span>
          </li>
          @endforeach
          </ul>
        </div>


        <button class="btn btn-success" type="submit">Save</button>
      </form>

@endsection