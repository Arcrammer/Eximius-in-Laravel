@extends('master')
@section('title', 'Listings')
@section('extra_stylesheets')
<link href="{{ elixir('assets/css/ListView.css') }}" rel="stylesheet">
@endsection
@section('content')
  @foreach($listings as $listing)
    <div class="list-item">
      <h4>{{ $listing->title }}</h4>
      <h5>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($listing->created_at))->diffForHumans() }} in {{ $listing->location }} at {{ $listing->business()->getResults()->business }}</h5>
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
    </div> <!-- .list-item -->
  @endforeach
  <div class="chronologic-buttons">
    @if($listings->previousPageUrl())
      <a href="{{ $listings->previousPageUrl() }}" class="button">
        <button>Earlier</button>
      </a>
    @endif
    @if ($listings->count() > 2)
      @for($i=$listings->currentPage(); $i < $listings->currentPage() + 10; $i++)
        <a href="{{ $listings->url($i) }}">{{ $i }}</a>
      @endfor
    @endif
    @if($listings->hasMorePages())
      <a href="{{ $listings->nextPageUrl() }}" class="button">
        <button>Older</button>
      </a>
    @endif
  </div> <!-- .chronologic-buttons -->
@endsection
