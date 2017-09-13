<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Image
 *
 * @mixin \Eloquent
 */
class Image extends Model
{
    public $timestamps = false;
    protected $table = 'images';
    protected  $fillable = [
      'path','position'
    ];
}
