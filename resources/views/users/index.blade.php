@extends('layouts.app')

@section('content')
  
  <div class="card card-default">
    <div class="card-header">Users</div>
    
    <div class="card-body">
      @if ($users->count() > 0)
        <div class="row mb-2">
          <div class="col-sm-3 col-md-3"><h4>Image</h4></div>
          <div class="col-sm-3 col-md-3"><h4>Name</h4></div>
          <div class="col-sm-3 col-md-3"><h4>Email</h4></div>
          <div class="col-sm-3 col-md-3"></div>
        </div>
      
        @foreach ($users as $user)
          <div class="row mb-2">
            <div class="col-sm-3 col-md-3">
              <img width="40px" height="40px" style="border-radius:50%" src="{{ Gravatar::src($user->email) }}" alt="">
            </div>
            <div class="col-sm-3 col-md-3">{{ $user->name }}</div>
            <div class="col-sm-3 col-md-3">{{ $user->email }}</div>
            <div class="col-sm-3 col-md-3">
              @if (!$user->isAdmin())
                <form action="{{ route('users.make-admin', $user->id) }}" method="post">
                  @csrf
                  <button class="btn btn-success btn-sm">Make Admin</button>
                </form>
              @endif
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
@endsection