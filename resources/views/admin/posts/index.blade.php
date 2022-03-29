@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-4 p-5">
                @include('includes.card')
                <a href="{{ route('admin.posts.show',$post->id) }}" class="btn btn-primary">Mostra</a>
                <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-warning">Modifica</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
