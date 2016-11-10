<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Photo;


class Flyer extends Model
{
    /**
    * fillable fields for a flyer
    * @return array
    */
    protected $fillable = [
      'street',
      'city',
      'state',
      'country',
      'zip',
      'price',
      'description',
    ];

    /**
    * A flyer is composed of many photos
    * @return Illuminate\Database\Eloquent\Relations\hasMany
    */
    public function photos()
    {
      return $this->hasMany('App\Photo');
    }

    public static function locatedAt($zip, $street)
    {
      $street = str_replace('-', ' ', $street);

      return static::where(compact('zip', 'street'))->firstOrFail();
    }

    public function addPhoto(Photo $photo)
    {
      //use the relationship to save the photo instance
      return $this->photos()->save($photo);
    }

    /**
    * Accessor for price column
    * @param integer $value
    * @return integer
    */
    public function getPriceAttribute($value)
    {

      return '$ ' . number_format($value);
    }

    /**
    * Accessor for description column
    * @param text $value
    * @return text
    */
    public function getDescriptionAttribute($value)
    {
      return nl2br($value);
    }
}
