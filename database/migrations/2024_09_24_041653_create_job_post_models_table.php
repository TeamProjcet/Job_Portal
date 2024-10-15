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
            $table->string('user_id')->constrained()->onDelete('cascade');
            $table->integer('category_id');
            $table->text('position');
            $table->integer('company_id');
            $table->integer('vacancy');
            $table->string('address');
            $table->text('details');
            $table->string('image')->nullable();
            $table->string('job_type');
            $table->integer('salary');
            $table->string('date_time');
            $table->integer('status')->default(0);
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
