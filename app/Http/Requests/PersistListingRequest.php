<?php

namespace Eximius\Http\Requests;

use Auth;
use Eximius\Http\Requests\Request;

class PersistListingRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if (Auth::check()) {
        return true;
      } else {
        return false;
      }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'title' => 'required|min:16|max:255',
        'location' => 'required|min:2',
        'listing_body' => 'required|min:16'
      ];
    }
}
