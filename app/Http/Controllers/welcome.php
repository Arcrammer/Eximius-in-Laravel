<?php
namespace Eximius\Http\Controllers;

use Illuminate\Http\Request;

use Eximius\Http\Requests;
use Eximius\Http\Controllers\Controller;

class welcome extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('welcome.index');
  }
}
