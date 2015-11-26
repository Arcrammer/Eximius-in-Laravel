@extends('auth.master')
@section('title', 'Login')
@section('content')
@if ($errors)
<div class="login-probs">
  @foreach ($errors->all() as $error)
    <p class="login-prob">{{ $error }}</p>
  @endforeach
</div> <!-- .login-probs -->
@endif
  <form method="POST" action="/auth/login">
    {!! csrf_field() !!}
    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
    <input type="password" name="password" placeholder="Password" id="password">
    <input type="submit" class="button" value="Login">
    <a href="/auth/register">I need an account.</a>
  </form>
@endsection
