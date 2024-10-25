<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontendmanages', function (Blueprint $table) {
            $table->id();
            //contact
            $table->text('location');
            $table->text('email');
            $table->string('phone');
            $table->text('map');
            $table->text('facebook');
            $table->text('youtube');
            $table->text('linkedin');
            $table->text('twitter');
            //about
            $table->text('image');
            $table->text('title');
            $table->text('details');
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
        Schema::dropIfExists('frontendmanage');
    }
};
