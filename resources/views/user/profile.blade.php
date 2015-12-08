@extends('master')
@section('title', 'Profile')
@section('extra_stylesheets')
<link rel="stylesheet" href="{{ elixir('assets/css/User.css') }}">
@endsection
@section('content')
  <div class="selfie-container">
    @if ($user->selfie_filename !== NULL)
      <img src="/assets/selfies/{{ $user->selfie_filename }}" alt="{{ $user->selfie_filename }}">
    @else
     <img class="selfie" name="selfie" src="/assets/selfies/None.png" alt="None">
    @endif
  </div> <!-- .selfie-container -->
  <div class="profile-data-container">
    <label for="username">Username:</label>
    <p>{{ $user->username }}</p>
    <br />
    <label for="email">Email:</label>
    <p>{{ $user->email }}</p>
    <br />
    <label for="type">Type:</label>
    @if ($user->is_employer && $user->is_seeker)
      <p>Employer, seeker.</p>
    @elseif ($user->is_employer)
      <p>Employer</p>
    @elseif ($user->is_seeker)
      <p>Seeker</p>
    @endif
  </div> <!-- .profile-data-container -->
</form>
@endsection
