<?php

namespace Eximius;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
  /**
   * Mass assignable values
   *
   * @var array
   */
   protected $fillable = ['business'];

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'businesses';
}
