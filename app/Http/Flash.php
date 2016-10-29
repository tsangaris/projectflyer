<?php


namespace App\Http;

class Flash
{
  /**
  * sets a flash message into the session
  * @return nothing
  */
  public function message($message)
  {
    session()->flash('flash_message', $message);
  }
}
