<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowtimeTheaters extends Model
{
     protected $table = 'Showtimes_Theaters';

    protected $primaryKey = 'theater_id';
    protected $fillable = ['name','lat','lon'];
    public $timestamps = false;
}
