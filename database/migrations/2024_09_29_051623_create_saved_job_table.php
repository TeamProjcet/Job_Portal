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
        Schema::create('saved_job', function (Blueprint $table) {
            $table->id();
            $table->integer('seeker_id')->constrained('job_seekers')->onDelete('cascade'); // Reference to job seekers table
            $table->integer('job_id')->constrained('jobs')->onDelete('cascade'); // Reference to jobs table
            $table->timestamp('saved_at')->useCurrent();
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
        Schema::dropIfExists('saved_job');
    }
};
