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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job_title');
            $table->string('email');
            $table->string('phone');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('address');
            $table->text('about_me');
            $table->text('photo');

            $table->string('university')->nullable();
            $table->string('university_specialization')->nullable();
            $table->date('university_start_date')->nullable();
            $table->date('university_end_date')->nullable();
            $table->text('university_description')->nullable();

            $table->string('company')->nullable();
            $table->string('company_job_title')->nullable();
            $table->date('company_start_date')->nullable();
            $table->date('company_end_date')->nullable();
            $table->text('company_description')->nullable();

            $table->string('project_title')->nullable();
            $table->string('project_name')->nullable();
            $table->date('project_start_date')->nullable();
            $table->date('project_end_date')->nullable();
            $table->text('project_description')->nullable();

            $table->text('languages')->nullable();
            $table->text('skills')->nullable();


            $table->foreignId('template_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('cvs');
    }
};
