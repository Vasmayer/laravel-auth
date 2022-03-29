@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group">
          <label for="image">Immagine</label>
          <input type="text" class="form-control" id="image" name="image" value="{{$post->image}}">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
          <textarea class="form-control" id="description" name="description" rows="5">{{$post->description}}</textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success">Modifica</button>
        </div>
      </form>
</div>
@endsection