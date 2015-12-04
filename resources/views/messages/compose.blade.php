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
  @if (isset($message_id))
    <h4>Reply to {{ $senders_username }}:</h4>
    <input type="hidden" name="original_message_id" value="{{ $message_id }}">
    <input autocomplete="off" type="hidden" name="to" value="{{ $senders_username }}">
    <input autocomplete="off" type="text" placeholder="Subject" name="subject" value="{{ $reply_subject }}">
    <br />
  @else
    <h4>Compose a Message:</h4>
    <input autocomplete="off" type="text" placeholder="To" name="to">
    <br />
    <input autocomplete="off" type="text" placeholder="Subject" name="subject">
    <br />
  @endif
  <textarea name="message_body" placeholder="Body" rows="16" cols="40"></textarea>
  <button>Send</button>
</form>
@endsection
