<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = "/";
    protected $loginPath = "auth/login";
    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // Save the image uploaded to the filesystem
        if (Input::hasFile('selfie')) {
          // The user has uploaded a selfie; Save
          // it to the servers' filesystem
          $extension = Input::file('selfie')->getClientOriginalExtension();
          $persistedFilename = md5(uniqid(rand(), true)) . '.' . $extension;
          $persistedPath = base_path() . '/public/assets/images/selfies/';
          Input::file('selfie')->move($persistedPath, $persistedFilename);

          // Tell the database the filename
          $data += array('selfie_filename' => $persistedFilename);
        } else {
          // The user has not uploaded a
          // selfie; Tell the database
          $data['selfie_filename'] = NULL;
        }

        // If checkboxes aren't ticked their values
        // aren't sent with the POST data, so we'll
        // set their values here before sending them
        // to the database.
        //
        (isset($data['is_employer'])) ? $data['is_employer'] = 1 : $data['is_employer'] = 0;
        (isset($data['is_seeker'])) ? $data['is_seeker'] = 1 : $data['is_seeker'] = 0;
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'selfie_filename' => $data['selfie_filename'],
            'is_employer' => $data['is_employer'],
            'is_seeker' => $data['is_seeker']
        ]);
    }
}
