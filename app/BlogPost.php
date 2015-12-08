<?php

namespace Eximius;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'body_filename',
    'header_image_filename',
    'created_at',
    'updated_at'
  ];
}
