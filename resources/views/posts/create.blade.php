@extends('layouts.app')

@section('content')

    {!! Form::open([ 'url'=>Route('posts.store'), 'files'=>true ]) !!}
        @csrf
        <h1>Create Post</h1>

        <div class="form-group">
            {!! Form::label('title', 'Post Title:'); !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Post Content:'); !!}
            {!! Form::text('content', null, ['class'=>'form-control']) !!}
        </div>
        <br>
        <div class="form-group">
            {!! Form::file('file', ['class'=>'form-control']) !!}
        </div>


        {{-- <input class="form-control" type="text" name="title" placeholder="Enter Title"><br>
        <input class="form-control" type="text" name="content" placeholder="Enter Content"><br> --}}
        <br>
        {!! Form::submit('Create Post', ['class'=> 'btn btn-primary']) !!}

    {!! Form::close() !!}
    <br>
    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>        
        @endforeach
    </ul>
    
@endsection