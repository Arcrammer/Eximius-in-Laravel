{{--
  index.blade.php

  Eximius
  Alexander Rhett Crammer
  Advanced Server-Side Languages
  Created Tuesday, 24 Nov. 2015
--}}
@extends('welcome.master')
@section('title', 'Home')
@section('content')
<div class="banner latest-blog-post">
  <div class="content">
    <h4>Eximius just moved to New York!</h4>
    <p>Thanks to you, EXIMIUS has finally expanded the office to New York. Every day we help numerous people find opportunities. Thanks to people like you we were able to open an office in New York where we’re helping nearly 100 people a day.</p>
    <button>Read More...</button>
  </div> <!-- .latest-blog-post-content -->
  <img src="assets/images/JonOttosson.jpeg" alt="JonOttosson">
</div> <!-- .banner .latest-blog-post -->
<div class="three-panels">
  <div class="panel">
    <img src="assets/icons/StackofPapers.svg" alt="StackofPapers">
    <h4>Hand Chosen</h4>
    <p>We review, revise, and watch every single listing posted by our employers before they reach you. Eximius doesn’t believe in scams nor unprofessionalism.</p>
  </div> <!-- .panel -->
  <div class="panel">
    <img src="assets/icons/Check.svg" alt="Check">
    <h4>Authentic</h4>
    <p>Each employer who joins partakes in an interview to discuss the needs of their business and the people they're looking for.</p>
  </div> <!-- .panel -->
  <div class="panel">
    <img src="assets/icons/Key.svg" alt="Key">
    <h4>Secure</h4>
    <p>We make use of several vigorous security measures like SSL encryption and two factor authentication to make sure your information is safe.</p>
  </div> <!-- .panel -->
</div> <!-- .three-panels -->
<div class="banner begin">
  <div class="content">
    <h4>Ready to begin?</h4>
    <p>You can start at absolutely no cost. Just upload your r&eacute;sum&eacute; and we’ll help you get started.</p>
    <button>Let's do it!</button>
  </div> <!-- .content -->
  <img src="assets/images/MarkusSpiske.jpg" alt="MarkusSpiske">
</div> <!-- .banner .begin -->
@endsection
