<?php

namespace Eximius\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Input;
use Eximius\Http\Controllers\Controller;
use Eximius\Http\Requests\PersistListingRequest;
use Eximius\Listing;
use Eximius\Business;

class Listings extends Controller
{
  /**
   * Show all of the listings
   *
   * @return \Illuminate\Http\Response
   */
  protected function all() {
    $viewData['isAllListingsPage'] = true;
    $viewData['listings'] = Listing::orderBy('created_at', 'desc')->paginate(15);
    return view('listings.all', $viewData);
  }

  /**
   * Allow employers to create new listings
   *
   * @param Eximius\Http\Requests\Request
   * @return \Illuminate\Http\Response
   */
  protected function create(Request $request) {
    if (Auth::check()) {
      // The user has signed in
      if (Auth::user()->is_employer) {
        // They're also an employer
        return view('listings.create');
      } else {
        // The user isn't an employer
        $request->session()->flash('needsEmployerStatus', true);
        return redirect('/profile');
      }
    } else {
      redirect('/auth/register');
    }
  }

  /**
   * Save a listing to the database (skipping
   * the review part for now considering this
   * isn't a serious job board application)
   *
   * @param PersistListingRequest $request
   * @return Response
   */
  protected function persist(PersistListingRequest $request) {
    // Save the listing body to the servers' filesystem
    $bodyFilename = md5(uniqid(rand(), true)).'.html';
    $bodyFile = fopen(base_path().'/public/assets/listing_bodies/'.$bodyFilename, 'w+');
    fwrite($bodyFile, $request->input('listing_body'));
    fclose($bodyFile);

    // Find or create the business name for the foreign table
    $business = Business::where('business', $request
      ->input('business_name'))
      ->first();
    if ($business == NULL) {
      // There isn't a business in the database with
      // the name provided by the listing creator
      // yet, so we'll create it
      $businessID = Business::create([
        'business' => $request->input('business_name')
      ])->id;
    } else {
      // The database already contains a business
      // with the name provided by the listing
      // creator, so we'll use its' ID
      $businessID = $business->id;
    }

    // Save the listing to the database
    // with links to the above assets
    $listing = Listing::create([
      'title' => $request->input('title'),
      'location' => $request->input('location'),
      'body_filename' => $bodyFilename,
      'business_id' => $businessID
    ]);
    return redirect('/listings');
  }
}
