@extends('layouts.app')

@section('content')
    
    <h5 class="text-primary">Edit post againt ID: {{$post->id}}</h5>
    <div class="list-group">
        <div class="list-group">
            <br>
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">{{ ucfirst($post->title) }}</h4>
                <small>{{ $post->created_at->format('F j, Y') }}</small>
            </div>
            <p class="mb-1">{{$post->content}}</small>
        </div>
        <br>
    </div>
    
    <div class="image-container">
        <img src="{{$post->path}}" width="400" height="500">
    </div>
    <br>
    {{-- {!! Form::submit('Delete Post', ['class'=> 'btn btn-danger', 'method'=>'DELETE']) !!}
    {!! Form::submit('Edit Post', ['class'=> 'btn btn-warning', 'url' => Route('posts.edit', $post->id)]) !!}
    {!! Form::submit('Veiw All Post', ['class'=> 'btn btn-info', 'url' => Route('posts.index')]) !!} --}}
    <div class="d-flex flex-row">
        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger mr-4" style="margin-right: 10px !important;">Delete Post</button>
        </form>
        <a class="btn btn-warning pr-3" style="margin-right: 10px !important;" href="{{route('posts.edit', $post->id)}}" class="link-warning">Edit Post</a><br>
        <a class="btn btn-info pr-3" href="{{route('posts.index')}}" class="link-info">Show All Post</a>
    </div>
@endsection