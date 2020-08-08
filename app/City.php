<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table="indonesia_cities";

    protected $primaryKey="post_id";
    protected $fillable=['id','province_id','name','meta'];
}
