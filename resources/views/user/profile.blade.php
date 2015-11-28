@extends('master')
@section('title', 'Profile')
@section('extra_stylesheets')
<link rel="stylesheet" href="{{ elixir('assets/css/User.css') }}">
@endsection
@section('needs_jquery', true)
@section('extra_scripts')
<script src="{{ elixir('assets/js/User.js') }}"></script>
@endsection
@section('content')
<form method="POST" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <input type="file" name="selfie" id="selfie">
  <div class="selfie-container">
     @if ($user->selfie_filename !== NULL)
       <div class="selfie-plus">
         <p>+</p>
       </div> <!-- .selfie-plus -->
       <img src="assets/images/selfies/{{ $user->selfie_filename }}" alt="{{ $user->selfie_filename }}" name="selfie" class="selfie">
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
