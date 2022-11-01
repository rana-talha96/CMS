@extends('layouts.app')

@section('content')
    <p class="display-4">Post:</p>
    <div class="list-group">
      <i style="align-self: flex-end" aria-hidden="true">
        <a href="{{route('posts.create')}}">
          <button class="btn btn-primary">Add New</button>
        </a>
      </i>
        @forelse($posts as $post)
        <div class="list-group">
            <br>
            <a href="{{route('posts.show', $post->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">{{ ucfirst($post->title) }}</h4>
                {{-- <small>{{ $post->created_at->format('F j, Y') }}</small> --}}
                <small>{{ $post->created_at->diffForHumans() }}</small>
              </div>
              <p class="mb-1">{{$post->content}}</small>
            </a>
        </div>
        <br>
        @empty
            <p class="text-warning">No blog Posts available</p>
        @endforelse
    </div>

    
    
@endsection