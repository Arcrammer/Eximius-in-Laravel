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
<div class="latest-blog-post">
  <div class="content">
    <h4>Eximius just moved to New York!</h4>
    <p>Thanks to you, EXIMIUS has finally expanded the office to New York. Every day we help numerous people find opportunities. Thanks to people like you we were able to open an office in New York where we’re helping nearly 100 people a day.</p>
    <button>Read More...</button>
  </div> <!-- .latest-blog-post-content -->
  <img src="assets/images/JonOttosson.jpeg" alt="JonOttosson.jpeg">
</div> <!-- .latest-blog-post -->
@endsection
