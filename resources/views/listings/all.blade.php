@extends('master')
@section('title', 'Listings')
@section('extra_stylesheets')
<link href="{{ elixir('assets/css/Listings.css') }}" rel="stylesheet">
@endsection
@section('content')
  @foreach($listings as $listing)
    <div class="listing">
      <h4>{{ $listing->title }}</h4>
      {!! file_get_contents(base_path().'/public/assets/listing_bodies/'.$listing->body_filename) !!}
      @if(Auth::id())
      <a href="/apply-to/{{ $listing->id }}">
        <button>Apply</button>
      </a>
      @else
        <a href="/auth/register/">
          <button>Sign Up</button>
        </a>
      @endif
    </div> <!-- .listing -->
  @endforeach
  <div class="chronologic-buttons">
    @if($listings->previousPageUrl())
      <a href="{{ $listings->previousPageUrl() }}" class="button">
        <button>Earlier</button>
      </a>
    @endif
    @for($i=1; $i < 11; $i++)
      <a href="{{ $listings->url($i) }}">{{ $i }}</a>
    @endfor
    @if($listings->hasMorePages())
      <a href="{{ $listings->nextPageUrl() }}" class="button">
        <button>Older</button>
      </a>
    @endif
  </div> <!-- .chronologic-buttons -->
@endsection
