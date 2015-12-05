@extends('auth.master')
@section('title', 'Login')
@section('content')
  <form method="POST" action="/auth/login" class="login-form">
    @if ($errors)
    <div class="probs">
      @foreach ($errors->all() as $error)
        <p class="prob">{{ $error }}</p>
      @endforeach
    </div> <!-- .login-probs -->
    @endif
    {!! csrf_field() !!}
    <input autocomplete="off" type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
    <br />
    <input autocomplete="off" type="password" name="password" placeholder="Password" id="password">
    <input type="submit" class="button" value="Login">
  </form>
  <a href="/auth/register/" class="under-the-form">Create an Account</a>
@endsection
