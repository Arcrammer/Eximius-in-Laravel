<?php

namespace Eximius\Http\Controllers;

use Illuminate\Http\Request;

use Eximius\Http\Requests;
use Eximius\Http\Controllers\Controller;
use Eximius\Listing;

class Listings extends Controller
{
  /**
   * Show all of the listings
   */
  public function all() {
    $viewData['listings'] = Listing::paginate(15);
    return view('listings.all', $viewData);
  }
}
