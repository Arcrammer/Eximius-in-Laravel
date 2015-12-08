@extends('master')

@section('title', 'Blog')

@section('extra_stylesheets')
<link rel="stylesheet" href="{{ elixir('assets/css/Blog.css') }}">
@endsection

@section('content')
<div class="active-post list-item">
  <h4>{{ $post->title }}</h4>
  <?php
    $bodyFilename = base_path().'/public/blog_posts/bodies/'.$post->body_filename;
    $bodyFile = fopen($bodyFilename, 'r');
    $body = fread($bodyFile, filesize($bodyFilename));
    fclose($bodyFile);
  ?>
  {!! nl2br($body) !!}
</div> <!-- .active-post -->
@endsection
<img src="/blog_posts/header_images/{{ $post->header_image_filename }}" alt="{{ $post->header_image_filename }}">
