@extends('layouts.app')

@section('content')
    <div class="card card-default">
      <div class="card-header">
        {{ isset($tag) ? 'Edit Tag' : 'Add Tag' }}
      </div>
      <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($tag) ? route('tags.update', $tag) : route('tags.store') }}" method="POST">
          @csrf
          @if (isset($tag))
            @method('PUT')
          @endif
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Tag Name" value="{{ isset($tag) ? $tag->name : ''}}">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">
              {{ isset($tag) ? 'Update Tag' : 'Add Tag '}}
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection