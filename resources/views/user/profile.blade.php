@extends('master')
@section('extra_stylesheets')
<link rel="stylesheet" href="{{ elixir('assets/css/User.css') }}">
@endsection
@section('content')
<form method="POST" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <input type="file" name="selfie">
  <div class="selfie-container">
     @if ($user->selfie !== NULL || TRUE)
     <!-- <img src="assets/images/selfies/{{ $user->selfie }}" alt="{{ $user->selfie }}" name="selfie"> -->
     <img class="selfie" name="selfie" src="assets/images/selfies/Me.jpg" alt="Me.jpg">
    @else
      <img class="selfie" name="selfie" src="assets/images/selfies/None.png" alt="None">
    @endif
  </div> <!-- .selfie-container -->
  <div class="field-container">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="{{ $user->username }}">
    <br />
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ $user->email }}">
    <br />
    <label for="cv">R&eacute;sum&eacute;:</label>
    <input type="file" name="cv" id="cv">
    <br />
    <button class="blue">Save</button>
  </div> <!-- .field-container -->
</form>
@endsection
