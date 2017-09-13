<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class request_fre_quote extends Model
{
    protected $fillable = ['name', 'email', 'skype','telephone'	,'Requirements'];
}
