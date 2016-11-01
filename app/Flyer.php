<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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

    public function scopeLocatedAt($query, $zip, $street)
    {
      $street = str_replace('-', ' ', $street);

      return $query->where(compact('zip', 'street'));
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
