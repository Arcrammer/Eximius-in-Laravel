<?php

namespace Eximius\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Input;
use Mail;
use Eximius\Http\Requests;
use Eximius\Http\Controllers\Controller;
use Eximius\Message;
use Eximius\User;

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
    $replyPrefixPattern = '/^(Reply:\s)*/';
    if (preg_match($replyPrefixPattern, $original_message->subject)) {
      // It's a reply to a reply; Remove
      // the extra 'Reply: ' prefixes
      $reply_subject = 'Reply: '.preg_replace($replyPrefixPattern, '', $original_message->subject);
    } else {
      // It's not a reply to a reply, prepend
      // 'Reply:' for the first time
      $reply_subject = 'Reply: '.$original_message->subject;
    }
    $this->view_data += [
      'isReplyMessage' => true,
      'message_id' => $id,
      'senders_username' => $original_message->sender->username,
      'reply_subject' => $reply_subject
    ];
    return view('messages.compose', $this->view_data);
  }

  /**
   * Send a reply message to another
   * user and email them about it.
   *
   * @return Illuminate\Http\Response
   */
  protected function send_message() {
    if (Input::get('is_reply') !== NULL) {
      $wasReply = true;

      // It's a reply message
      $original_message = Message::find((int) Input::get('original_message_id'));

      // Get the 'id' of the user the
      // message is in reply to
      $to = (int) Input::get('to');

      // And the username of the sender.
      $sender = $original_message->sender->username;
    } else {
      $wasReply = false;

      // It's a new message (i.e. not a reply)
      $original_message = NULL;

      // Get the 'id' of the user the
      // message is being sent to
      $to = User::where('username', '=', Input::get('to'))->first()->id;

      // And the username of the sender
      $sender = Auth::user()->username;
    }

    // Save the body of the message
    // to the filesystem
    $bodyFilename = md5(uniqid(rand(), true)).'.html';
    $bodyFile = fopen(base_path().'/resources/message_bodies/'.$bodyFilename, 'w+');
    fwrite($bodyFile, Input::get('message_body'));
    fclose($bodyFile);

    // Save it to the database
    $messageWasSaved = Message::create([
      'from' => Auth::id(),
      'to' => $to,
      'subject' => Input::get('subject'),
      'body_filename' => $bodyFilename,
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ]);

    if ($messageWasSaved) {
      // Notify the recipient through email
      $mailViewData = [
        'sender' => $sender,
        'preview' => substr(Input::get('message_body'), 0, 200).'...',
        'subject' => Input::get('subject')
      ];

      // Send the mail message
      Mail::send('mail.message_received', $mailViewData, function ($message) use ($sender) {
        $message->from('alexander2475914@gmail.com', 'Eximius');
        $message->to(Auth::user()->email);
        $message->subject($sender.' has sent you a message through Eximius!');
      });

      // Redirect the sender to their messages
      return redirect('/messages');
    } else {
      echo 'Your message couldn\'t be sent.';
    }
  }
}
