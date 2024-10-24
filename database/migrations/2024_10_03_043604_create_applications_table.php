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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->integer('seeker_id');
            $table->string('image');
            $table->text('coverLetter');
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('portfolio');
            $table->string('application_status')->default(0);
            $table->string('interview_status')->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('applications');
    }
};
