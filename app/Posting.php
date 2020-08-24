<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posting extends Model{

	


    protected $table="posting";

    protected $primaryKey="post_id";
    protected $fillable=['product_sku','product_name','channel_type','channel_name','channel_city','post_url','post_title','price','status','photo','user_id'];

    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
