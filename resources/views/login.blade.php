@extends('layout')
@section('content')
 {{-- nav bar start --}}
 <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Navbar</span>
      <a href="{{route('login')}}">Login</a>
      <a href="{{route('register')}}">Register</a>
    </div>
  </nav>
{{-- nav bar end --}}
<div class="card">
    <div class="card-body">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif
      <h5 class="card-title">Login</h5>
      <form class="" method="POST" action="{{route('postLogin')}}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          @if($errors->has('email'))
            <span class="text-danger text-sm">{{$errors->first('email')}}</span>
          @endif
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          @if($errors->has('password'))
            <span class="text-danger text-sm">{{$errors->first('password')}}</span>
          @endif
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>


@endsection
