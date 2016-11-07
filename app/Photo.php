<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Photo extends Model
{
    //By default its going to use the plural snakecase of the model, meaning photos
    //But in our case the name of the table is named flyer_photos
    protected $table = 'flyer_photos';

    //set fillable
    protected $fillable = [
      'path',
    ];

    //where the flyer photos will be stored
    protected $baseDir = 'flyer/photos';

    /**
    * A photo belongs to one Flyer
    * @return [type][description]
    */
    public function flyer()
    {
      return $this->belonsTo('App\Flyer');
    }

    public static function fromForm(UploadedFile $file)
    {
      $photo = new static;

      //name the file with a unique name using UNIX timestamp as a prefix
      $name = time() .  $file->getClientOriginalName();

      //set the path column to the correct value
      //remember that Eloquent uses the table columns of the model as variables
      $photo->path = '/' . $photo->baseDir . '/' . $name;

      //maybe is not the responsibility of the model to move the photo to the storage
      //we could have done it in the controller
      $file->move($photo->baseDir, $name);

      //we need to return the photo instance since we are going to use it in the addPhoto() method
      return $photo;
    }
}
