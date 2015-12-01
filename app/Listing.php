<?php

namespace Eximius;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
  /**
   * Mass assignable values
   *
   * @var array
   */
   protected $fillable = [
     'title',
     'location',
     'body_filename'
   ];

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'listings';

  public function business() {
    return $this->belongsTo('Eximius\Business', 'business_id');
  }
}
