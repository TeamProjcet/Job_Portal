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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();  // Primary Key
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade'); // Foreign Key (Reference to user_id)
            $table->string('company_name');
            $table->string('company_website')->nullable();
            $table->string('company_address');
            $table->string('contact_person');
            $table->string('industry');
            $table->text('company_description')->nullable();
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
        Schema::dropIfExists('employers');
    }
};
