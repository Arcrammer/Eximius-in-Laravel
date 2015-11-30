@extends('master')
@section('title', 'Listings » Create')
@section('extra_stylesheets')
<link href="{{ elixir('assets/css/Listings.css') }}" rel="stylesheet">
@endsection
@section('content')
<form class="listing-creation-form" method="post">
  @if ($errors)
  <div class="probs">
    @foreach ($errors->all() as $error)
      <p class="prob">{{ $error }}</p>
    @endforeach
  </div> <!-- .login-probs -->
  @endif
  {!! csrf_field() !!}
  <h4>Create a Listing:</h4>
  <input type="text" placeholder="Title" name="title">
  <br />
  <input type="text" placeholder="Location" name="location">
  <br />
  <input type="text" placeholder="Business Name" name="business_name">
  <br />
  <textarea name="listing_body" placeholder="Description" rows="16" cols="40"></textarea>
  <button>Submit for Review</button>
</form>
@endsection
