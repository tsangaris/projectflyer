<?php

namespace App\Http\Controllers\Traits;

use App\Flyer;
use Illuminate\Http\Request;

trait AuthorizesUsers {

  protected function userCreatedFlyer(Request $request)
  {
    return Flyer::where([
      'zip' => $request->zip,
      'street' => $request->address,
      'user_id' => \Auth::user()->id
    ])->exists();
  }

  /**
  * Determine if the request is the result of an AJAX call or not
  * @return [type]
  */
  protected function unauthorized(Request $request)
  {
    if($request->ajax()) {
      return response(['message' => 'No way'], 403);
    }

    flash('No way');

    return redirect('/');
  }
}
