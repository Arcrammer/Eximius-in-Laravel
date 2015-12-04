<?php

namespace Eximius;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
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
