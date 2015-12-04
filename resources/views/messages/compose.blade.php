@extends('master')

@section('title', 'Messages')

@section('extra_stylesheets')
<link rel="stylesheet" href="{{ elixir('assets/css/ListView.css') }}">
<link rel="stylesheet" href="{{ elixir('assets/css/Messages.css') }}">
@endsection

@section('content')
<form class="composition-form" method="post">
  @if ($errors)
  <div class="probs">
    @foreach ($errors->all() as $error)
      <p class="prob">{{ $error }}</p>
    @endforeach
  </div> <!-- .probs -->
  @endif
  {!! csrf_field() !!}
  <h4>Compose a Message:</h4>
  <input autocomplete="off" type="text" placeholder="To" name="to">
  <br />
  <input autocomplete="off" type="text" placeholder="Subject" name="subject">
  <br />
  <textarea name="message_body" placeholder="Body" rows="16" cols="40"></textarea>
  <button>Send</button>
</form>
@endsection
