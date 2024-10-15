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
        Schema::create('interview_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id')->constrained('jobs')->onDelete('cascade');
            $table->integer('user_id')->constrained('users')->onDelete('cascade');
            $table->text('location');
            $table->text('notic');
            $table->date('interview_date');
            $table->time('interview_time');
            $table->integer('interview_status')->default(0);
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_schedules');
    }
};
