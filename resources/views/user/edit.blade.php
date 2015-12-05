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
@if (session('needsEmployerStatus'))
<p class="problem">You need to be an employer to do that.</p>
@endif
<form method="POST" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <input type="file" name="selfie" id="selfie" accept="image/*">
  <div class="selfie-container">
    <div class="selfie-plus">
      <p>+</p>
    </div> <!-- .selfie-plus -->
     @if ($user->selfie_filename !== NULL)
       <img src="/assets/selfies/{{ $user->selfie_filename }}" alt="{{ $user->selfie_filename }}" name="selfie" class="selfie">
    @else
      <img class="selfie" name="selfie" src="/assets/selfies/None.png" alt="None">
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
    <input type="file" name="cv" id="cv" accept="application/pdf">
    <br />
    <label class="tiny-label" for="is_employer">I'm an employer:</label>
    <input type="checkbox" name="is_employer" id="is_employer" {{ ($user->is_employer != 0) ? 'checked' : '' }}>
    <br />
    <label class="tiny-label" for="is_seeker">I'm looking for jobs:</label>
    <input type="checkbox" name="is_seeker" id="is_seeker" {{ ($user->is_seeker != 0) ? 'checked' : '' }}>
    <br />
    <button class="blue">Save</button>
  </div> <!-- .field-container -->
</form>
@endsection
