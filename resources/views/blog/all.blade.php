@extends('master')

@section('title', 'Blog')

@section('extra_stylesheets')
<link rel="stylesheet" href="{{ elixir('assets/css/Blog.css') }}">
@endsection

@section('content')
  @foreach ($posts as $post)
    <div class="post list-item">
      <a href="/read/{{ $post->id }}">
        <h4>{{ trim(substr($post->title, 0, 26)).'...' }}</h4>
        <p>{!! trim(file_get_contents(base_path().'/public/blog_posts/bodies/'.$post->body_filename, FALSE, NULL, -1, 150)).'...' !!}</p>
        <a href="/read/{{ $post->id }}">Read More...</a>
        <img src="/blog_posts/header_images/{{ $post->header_image_filename }}" alt="{{ $post->header_image_filename }}">
      </a>
    </div> <!-- .post -->
  @endforeach
@endsection
