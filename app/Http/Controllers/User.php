<?php

namespace Eximius\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Eximius\Http\Requests;
use Eximius\Http\Controllers\Controller;
use Input;

class User extends Controller
{
  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = [
    'deleted_at',
    'created_at',
    'updated_at'
  ];

  /**
   * Soft delete a users' profile
   *
   * @return Illuminate\Http\Response
   */
  protected function delete() {
    \Eximius\User::destroy(Auth::id());
    Auth::logout();
    return redirect('/');
  }

  /**
   * Return information about the user
   *
   * @param Illuminate\Http\Request request
   * @return Illuminate\Http\Response
   */
  protected function edit(Request $request)
  {
    if (Auth::id()) {
      $viewData = [
        'user' => Auth::user()
      ];
      return view('user.edit', $viewData);
    } else {
      return redirect('/auth/login');
    }
  }

  /**
   * Show information of a user
   *
   * @param integer $id
   * @return Illuminate\Http\Response
   */
  protected function profile($id) {
    $viewData = [
      'user' => \Eximius\User::find($id)
    ];
    return view('user.profile', $viewData);
  }

  /**
   * Update the information of a user
   *
   * @param Illuminate\Http\Request request
   * @return Illuminate\Http\Response
   */
  protected function update(Request $request)
  {
    $user = Auth::user();
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    if (Input::hasFile('selfie')) {
      // The user has uploaded a new selfie; Save it
      $extension = Input::file('selfie')->getClientOriginalExtension();
      $persistedFilename = md5(uniqid(rand(), true)) . '.' . $extension;
      $persistedPath = base_path() . '/public/assets/selfies/';
      $moved = Input::file('selfie')->move($persistedPath, $persistedFilename);

      // Delete the old one
      if ($moved && isset($user->selfie_filename)) {
        unlink(base_path() . '/public/assets/selfies/' . $user->selfie_filename);
      }

      // Tell the database the filename
      $user->selfie_filename = $persistedFilename;
    }
    if (Input::hasFile('cv')) {
      // The user has uploaded their résumé; Save it
      $extension = Input::file('cv')->getClientOriginalExtension();
      $persistedFilename = md5(uniqid(rand(), true)) . '.' . $extension;
      $persistedPath = base_path() . '/public/assets/résumés/';
      $moved = Input::file('cv')->move($persistedPath, $persistedFilename);

      // Delete the old one
      if ($moved && isset($user->résumé_filename)) {
        unlink(base_path() . '/public/assets/résumés/' . $user->résumé_filename);
      }

      // Tell the database the filename
      $user->résumé_filename = $persistedFilename;
    }
    ($request->has('is_employer')) ? $user->is_employer = 1 : $user->is_employer = 0;
    ($request->has('is_seeker')) ? $user->is_seeker = 1 : $user->is_seeker = 0;
    $user->save();
    return redirect('/profile/edit');
  }
}
