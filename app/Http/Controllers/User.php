<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class User extends Controller
{
  public function profile()
  {
    $viewData = [
      'user' => Auth::user()
    ];
    return view('user.profile', $viewData);
  }
}
