<?php

namespace Eximius;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
  use SoftDeletes;

  /**
   * Mass assignable properties
   *
   * @var array
   */
  protected $fillable = [
    'from',
    'to',
    'subject',
    'body_filename',
    'created_at',
    'updated_at'
  ];

  /**
   * Messages have senders
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function sender() {
    return $this->belongsTo('Eximius\User', 'from');
  }

  /**
   * Messages belong to their recipients
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function recipient() {
    return $this->belongsTo('Eximius\User', 'to');
  }
}
