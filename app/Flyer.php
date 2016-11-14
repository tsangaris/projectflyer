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
      'user_id',
      'street',
      'city',
      'state',
      'country',
      'zip',
      'price',
      'description',
    ];

    protected $currency = '$';

    /**
    * A flyer is composed of many photos
    * @return Illuminate\Database\Eloquent\Relations\hasMany
    */
    public function photos()
    {
      return $this->hasMany('App\Photo');
    }

    /**
    *
    * A flyer belongs to a user
    *
    **/
    public function user()
    {
      return $this->belongsTo('App\User');
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
    * Checks if the given user created the flyer
    * @param User $user
    * @return boolean
    */
    public function ownedBy(User $user)
    {
      return $this->user_id == $user->id;
    }

    /**
    * Accessor for price column
    * @param integer $value
    * @return integer
    */
    public function getPriceAttribute($value)
    {

      return $this->currency . number_format($value);
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
