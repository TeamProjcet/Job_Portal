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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('resume')->nullable(); // Resume/CV link
            $table->text('skills'); // Skills
            $table->text('experience')->nullable(); // Experience
            $table->text('education')->nullable(); // Education
            $table->string('preferred_location')->nullable(); // Preferred location
            $table->date('availability')->nullable();
            $table->timestamps();
            $table->foreign('seeker_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_seekers');
    }
};
