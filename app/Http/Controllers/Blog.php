<?php

namespace Eximius\Http\Controllers;

use Illuminate\Http\Request;

use Eximius\Http\Requests;
use Eximius\Http\Controllers\Controller;
use Eximius\BlogPost;

class Blog extends Controller
{
  /**
   * Show the user all of the blog
   * posts with pagination
   *
   * @return Illuminate\Http\Response
   */
  protected function all() {
    $posts = BlogPost::orderBy('created_at', 'DESC')
      ->paginate(15);
    return view('blog.all', ['posts' => $posts]);
  }

  /**
   * Show the visitor a blog post
   *
   * @return Illuminate\Http\Response
   */
  protected function show_post($id) {
    if ($id == 'latest') {
      $post = BlogPost::first();
    } else {
      $post = BlogPost::find($id);
    }

    $post->body = file_get_contents(base_path().'/public/blog_posts/bodies/'.$post->body_filename);

    return view('blog.post', ['post' => $post]);
  }
}
