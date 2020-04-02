@extends('layouts.app')
@section('content')

  <form action="{{route('registred.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title">
        </div>

        <div class="form-group">
          <label for="body">Body</label>
          <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
          <label for="tags">Tags</label>
          <ul class="list-inline">
          @foreach ($tags as $tag)
          <li class="list-inline-item">
            <input type="checkbox" name="tags[]" value="{{$tag->id}}">
            <span>{{$tag->description}}</span>
          </li>
          @endforeach
          </ul>
        </div>

        <div class="form-group">
          <label for="nopublished">Da Pubblicare</label>
          <input type="radio" name="published" value="0" id="nopublished">
          <label for="published">Pubblicato</label>
          <input type="radio" name="published" value="1" id="published">
        </div>
        
        <div class="form-group">
          <input type="file" name="path_image" accept="image/*">
        </div>

        <button class="btn btn-success" type="submit">Save</button>
      </form>

    
@endsection