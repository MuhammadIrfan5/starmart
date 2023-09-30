<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    //
    protected $guard = ['id', 'created_at','updated_at'];
	protected $table = 'points';
 
}
