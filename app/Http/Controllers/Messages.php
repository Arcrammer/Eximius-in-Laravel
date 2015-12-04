<?php

namespace Eximius\Http\Controllers;

use Illuminate\Http\Request;

use Eximius\Http\Requests;
use Eximius\Http\Controllers\Controller;

class Messages extends Controller
{
  /**
   * View data for all methods
   *
   * @var array
   */
  protected $viewData = [
    'isMessagesPage' => true
  ];

  /**
   * Show all of the users messages
   *
   * @return Illuminate\Http\Response
   */
  protected function all() {
    return view('messages.all', $this->viewData);
  }

  /**
   * Allow the user to create a message
   */
  protected function compose() {
    return view('messages.compose', $this->viewData);
  }
}
