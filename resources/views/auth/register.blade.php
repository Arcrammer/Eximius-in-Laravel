@extends('auth.master')
@section('title', 'Register')
@section('content')
<form id="registration-form" method="POST" action="/auth/register" enctype="multipart/form-data">
  @if ($errors)
  <div class="probs">
    @foreach ($errors->all() as $error)
      <p class="prob">{{ $error }}</p>
    @endforeach
  </div> <!-- .login-probs -->
  @endif
  {!! csrf_field() !!}
  <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
  <input type="email" name="email" id="email_address" placeholder="Email" value="{{ old('email') }}">
  <input type="password" name="password" id="password" placeholder="Password">
  <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Again">
  <label for="selfie" class="file-label">Selfie:</label>
  <input type="file" name="selfie" id="selfie" accept="image/jpg">
  <label for="résumé" class="file-label">Résumé:</label>
  <input type="file" name="résumé" id="résumé" accept="application/pdf">
  <label for="is_employer" class="first-checkbox-label">I'm an employer</label>
  <input type="checkbox" name="is_employer" id="is_employer" value="{{ old('is_employer') }}">
  <label for="is_seeker" class="last-checkbox-label">I'm looking for jobs</label>
  <input type="checkbox" name="is_seeker" id="is_seeker" value="{{ old('is_seeker') }}">
  <input class="button" type="submit" value="Register">
</form>
<a href="/auth/login/" class="under-the-form">Login</a>
@endsection
