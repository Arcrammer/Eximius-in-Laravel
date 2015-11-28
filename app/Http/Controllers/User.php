<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class User extends Controller
{
  /**
   * Return information about the user
   *
   * @param Illuminate\Http\Request request
   */
  public function profile(Request $request)
  {
    if (Auth::id()) {
      $viewData = [
        'user' => Auth::user()
      ];
      return view('user.profile', $viewData);
    } else {
      return redirect('/');
    }
  }

  /**
   * Update the information of a user
   *
   * @param Illuminate\Http\Request request
   */
  public function update(Request $request)
  {
    $user = Auth::user();
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    if (Input::hasFile('selfie')) {
      // The user has uploaded a new selfie; Save it
      $extension = Input::file('selfie')->getClientOriginalExtension();
      $persistedFilename = md5(uniqid(rand(), true)) . '.' . $extension;
      $persistedPath = base_path() . '/public/assets/images/selfies/';
      Input::file('selfie')->move($persistedPath, $persistedFilename);

      // Tell the database the filename
      $user['selfie_filename'] = $persistedFilename;
    }
    $user->save();
    return redirect('/profile');
  }
}
