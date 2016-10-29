<?php


function flash($message)
{
  //fetch the Flash class out of  Laravel's container
  //app method fetch things out of the service container
  $flash = app('App\Http\Flash');

  //use the message method to pass the message
  return $flash->message($message);
}
