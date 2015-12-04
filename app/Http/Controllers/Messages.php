<?php

namespace Eximius\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Input;
use Eximius\Http\Requests;
use Eximius\Http\Controllers\Controller;
use Eximius\Message;

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
      'messages' =>
        Auth::user()
          ->messages
          ->sortByDesc('created_at')
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

  /**
   * Allow the user to reply to a message
   *
   * @return Illuminate\Http\Response
   */
  protected function reply($id) {
    $original_message = Message::find($id);
    $this->view_data += [
      'message_id' => $id,
      'senders_username' => $original_message->sender->username,
      'reply_subject' => 'Reply: '.$original_message->subject
    ];
    return view('messages.compose', $this->view_data);
  }

  /**
   * Send a message
   *
   * @return Illuminate\Http\Response
   */
  protected function send_message() {
    $original_message = Message::find((int) Input::get('original_message_id'));

    // Save the body of the message
    // to the filesystem
    $bodyFilename = md5(uniqid(rand(), true)).'.html';
    $bodyFile = fopen(base_path().'/resources/message_bodies/'.$bodyFilename, 'w+');
    fwrite($bodyFile, Input::get('message_body'));
    fclose($bodyFile);

    // Save it to the database
    $messageWasSaved = Message::create([
      'from' => Auth::id(),
      'to' => $original_message->sender->id,
      'subject' => Input::get('subject'),
      'body_filename' => $bodyFilename,
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ]);

    if ($messageWasSaved) {
      return redirect('/messages');
    } else {
      echo 'Your message couldn\'t be sent.';
    }
  }
}
