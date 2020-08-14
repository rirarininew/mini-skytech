<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posting', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('product_sku');
            $table->string('product_name');
            $table->string('channel_type');
            $table->string('channel_name');
            $table->string('channel_city');
            $table->string('post_url');
            $table->string('post_title');
            $table->integer('price');
            $table->string('status');
            $table->string('photo');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posting');
    }
}
