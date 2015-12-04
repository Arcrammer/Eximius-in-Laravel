@extends('master')

@section('title', 'Messages')

@section('extra_stylesheets')
<link rel="stylesheet" href="{{ elixir('assets/css/ListView.css') }}">
<link rel="stylesheet" href="{{ elixir('assets/css/Messages.css') }}">
@endsection

@section('content')
  @foreach ($messages as $message)
  <div class="list-item">
    <h4>{{ $message->subject }}</h4>
    <h5>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans() }} from {{ $message->sender->username }}</h5>
    {!! file_get_contents(base_path().'/resources/message_bodies/'.$message->body_filename) !!}
    <a href="/messages/reply/{{ $message->id }}">
      <button>Reply</button>
    </a>
  </div> <!-- .list-item -->
  @endforeach
@endsection
