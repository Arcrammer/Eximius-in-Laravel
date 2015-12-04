<?php

namespace Eximius\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Eximius\Http\Requests;
use Eximius\Http\Controllers\Controller;

class Messages extends Controller
{
  /**
   * View data for all methods
   *
   * @var array
   */
  protected $view_data = [
    'isMessagesPage' => true
  ];

  /**
   * Show all of the users messages
   *
   * @return Illuminate\Http\Response
   */
  protected function all() {
    $this->view_data += [
      'messages' => Auth::user()->messages->all()
    ];
    return view('messages.all', $this->view_data);
  }

  /**
   * Allow the user to create a message
   *
   * @return Illuminate\Http\Response
   */
  protected function compose() {
    return view('messages.compose', $this->view_data);
  }
}
