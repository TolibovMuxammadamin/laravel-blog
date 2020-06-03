@extends('layouts.app')

@section('content')
  
  <div class="card card-default">
    <div class="card-header">Posts</div>
    
    <div class="card-body">
      @if ($posts->count() > 0)
        <div class="row">
          <div class="col-sm-3 col-md-3"><h4>Image</h4></div>
          <div class="col-sm-3 col-md-3"><h4>Title</h4></div>
          <div class="col-sm-3 col-md-3"><h4>Category</h4></div>
          <div class="col-sm-3 col-md-3"></div>
        </div>
      
        @foreach ($posts as $post)
          <div class="row mb-2">
            <div class="col-sm-3 col-md-3">
              <img src="{{ asset('/storage/' . $post->image) }}" alt="" style="width:50%">
            </div>
            <div class="col-sm-3 col-md-3">{{ $post->title }}</div>
            <div class="col-sm-3 col-md-3">
              <a href="{{ route('categories.edit', $post->category->id) }}">
                {{ $post->category->name }}
              </a>
            </div>
            <div class="col-sm-3 col-md-3">
              <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="float-right">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm float-right">
                  {{ $post->trashed() ? 'Delete' : 'Trash' }}
                </button>
              </form>
              @if ($post->trashed())
                <form action="{{ route('restore-posts', $post->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-success btn-sm">
                    Restore
                  </button>
                </form>
              @else
                <a href=" {{ route('posts.edit', $post->id) }} " class="btn btn-success btn-sm mr-2">Edit</a>  
              @endif
            </div>
          </div>
        @endforeach
      @else
        <h3 class="text-center">Posts Not Found</h3>
      @endif
      <div class="mt-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-block">Add Post</a>
      </div>
    </div>
  </div>
@endsection