<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTheaters extends Model
{
    protected $table = 'user_theaters';

    protected $primaryKey = 'id';
    protected $fillable = ['user_id','theater_id'];
    public $timestamps = false;
}
