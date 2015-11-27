@extends('auth.master')
@section('title', 'Register')
@section('content')
@if ($errors)
<div class="probs">
  @foreach ($errors->all() as $error)
    <p class="prob">{{ $error }}</p>
  @endforeach
</div> <!-- .login-probs -->
@endif
  <form id="registration-form" method="POST" action="/auth/register">
    {!! csrf_field() !!}
    <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
    <input type="email" name="email" id="email_address" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" id="password" placeholder="Password">
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Again">
    <label for="is_employer">I'm an employer</label>
    <input type="checkbox" name="is_employer" id="is_employer" value="{{ old('is_employer') }}">
    <label for="is_seeker">I'm looking for jobs</label>
    <input type="checkbox" name="is_seeker" id="is_seeker" value="{{ old('is_seeker') }}">
    <input class="button" type="submit" value="Register">
  </form>
  <a href="/auth/login/" class="under-the-form">Login</a>
@endsection
