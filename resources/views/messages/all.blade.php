@extends('master')

@section('title', 'Messages')

@section('extra_stylesheets')
<link rel="stylesheet" href="{{ elixir('assets/css/Messages.css') }}">
@endsection

@section('content')
  @foreach ($messages as $message)
    <pre style="color: white">
      From: {{ $message->sender->username }}
      To: {{ $message->recipient->username }}
    </pre>
  @endforeach
@endsection
