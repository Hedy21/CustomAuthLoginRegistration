@extends('layout')
@section('content')
 {{-- nav bar start --}}
 <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Navbar</span>
      <a href="{{route('signout')}}">logout</a>
      <a href="">Profile</a>
    </div>
  </nav>
{{-- nav bar end --}}

<h3>HELLO : {{Auth::user()->name}}</h3>
@endsection
