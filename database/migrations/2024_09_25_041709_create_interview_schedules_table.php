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
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade'); // Reference to jobs table
            $table->foreignId('seeker_id')->constrained('job_seekers')->onDelete('cascade'); // Reference to job_seekers table
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade'); // Reference to employers table
            $table->date('interview_date'); // Interview date
            $table->time('interview_time'); // Interview time
            $table->enum('interview_status', ['Scheduled', 'Completed', 'Cancelled']); // Interview status
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
