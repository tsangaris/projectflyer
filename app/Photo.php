<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //By default its going to use the plural snakecase of the model, meaning photos
    //But in our case the name of the table is named flyer_photos
    protected $table = 'flyer_photos';

    //set fillable
    protected $fillable = [
      'photo',
    ];

    /**
    * A photo belongs to one Flyer
    * @return [type][description]
    */
    public function flyer()
    {
      return $this->belonsTo('App\Flyer');
    }
}
