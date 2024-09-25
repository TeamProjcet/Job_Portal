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
        Schema::create('company_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade'); // Reference to employers table
            $table->foreignId('seeker_id')->constrained('job_seekers')->onDelete('cascade'); // Reference to job seekers table
            $table->tinyInteger('rating')->unsigned(); // Rating from 1 to 5
            $table->text('review_content'); // Review content
            $table->timestamp('review_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_reviews');
    }
};
