<?php


function flash($title = null, $message = null)
{
  //fetch the Flash class out of  Laravel's container
  //app method fetch things out of the service container
  $flash = app('App\Http\Flash');

  //if no arguments are passed to this function
  //that means if we use the following format: flash()->xxxx
  //where xxx = success, error, overlay
  if( func_num_args() == 0) {
    return $flash;
  }

  //use the info method to pass the message
  //info will be the default action if arguments are passed directly in the flash function
  return $flash->info($title, $message);
}
