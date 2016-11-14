<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Photo extends Model
{
    //By default its going to use the plural snakecase of the model, meaning photos
    //But in our case the name of the table is named flyer_photos
    protected $table = 'flyer_photos';

    //set fillable
    protected $fillable = [
      'name',
      'path',
      'thumbnail_path',
    ];

    //where the flyer photos will be stored
    protected $baseDir = 'flyer/photos';

    /**
    * A photo belongs to one Flyer
    * @return [type][description]
    */
    public function flyer()
    {
      return $this->belongsTo('App\Flyer');
    }

    /**
    * Build a new photo instance from a file upload
    * @param string $name
    * @return self
    */
    public static function named($name)
    {
      $photo = new static;

      //we need to return the photo instance since we are going to use it in the addPhoto() method
      return $photo->saveAs($name);
    }

    protected function saveAs($name)
    {
      $this->name = sprintf('%d-%s', time(), $name);
      $this->path = sprintf('%s/%s', $this->baseDir, $this->name);
      $this->thumbnail_path = sprintf('%s/tn-%s', $this->baseDir, $this->name);

      return $this;
    }

    /**
    * moves the uploaded file to the desired location
    * @param UploadedFile $file
    * @return void
    */
    public function move(UploadedFile $file)
    {
      $file->move($this->baseDir, $this->name);

      $this->makeThumbnail();

      return $this;
    }

    /**
    *
    * get the image, fit, resize and crop into 200x200px, and then store it
    *
    **/
    protected function makeThumbnail()
    {
      Image::make($this->path)->fit(200)->save($this->thumbnail_path);
    }
}
