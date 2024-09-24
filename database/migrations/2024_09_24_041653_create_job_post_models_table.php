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
        Schema::create('job_post_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('company');
            $table->text('image');
            $table->string('address');
            $table->text('details');
            $table->string('job_type');
            $table->string('salary');
            $table->string('date_time');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('job_post_models');
    }
};
