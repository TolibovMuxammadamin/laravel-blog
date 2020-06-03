@extends('layouts.app')

@section('content')
  <div class="card">

    <div class="card-header">My Profile</div>

    <div class="card-body">
      @include('partials.errors')

      <form action="{{ route('users.update-profile') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group">
          <label for="about">About me</label>
          <textarea name="about" id="about" cols="5" rows="5"  class="form-control">{{ $user->about }}</textarea>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Update User</button>
        </div>
      </form>
    </div>
  </div>
@endsection