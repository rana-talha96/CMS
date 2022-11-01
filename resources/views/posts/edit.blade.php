@extends('layouts.app')

@section('content')

    {!! Form::open(['url'=>Route('posts.update', $post->id), 'method'=>'put']) !!}
        @csrf
        <h5 class="text-primary">Edit post againt ID: {{$post->id}}</h5>
        <div class="form-group">
            {!! Form::label('title', 'Post Title:'); !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'placeholder' => ($post->title)]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Post Content:'); !!}
            {!! Form::text('content', null, ['class'=>'form-control', 'placeholder' => ($post->content)]) !!}
        </div>
        <br>
        {!! Form::submit('Update Post', ['class'=> 'btn btn-warning']) !!}

    {!! Form::close() !!}
    
@endsection