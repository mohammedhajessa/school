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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Trust');
            $table->string('record');
            $table->string('record_number');
            $table->string('record_place');
            $table->string('place_birth');
            $table->string('nationalNumber');
            $table->string('email');
            $table->string('password');
            $table->string('student_code')->unique();
            $table->string('academic_year');
            $table->date('Date_Birth');
            $table->date('enrollment_date')->nullable();
            $table->text('failed_classes_prev_School')->nullable();
            $table->text('failed_classes')->nullable();
            $table->text('subjects_excellent_in')->nullable();
            $table->text('subjects_weak_in')->nullable();
            $table->string('transfer_document_number')->nullable();
            $table->date('transfer_document_date')->nullable();
            $table->text('reason_for_leaving_school')->nullable();
            $table->string('previous_class')->nullable();
            $table->date('date_of_leaving_previous_class')->nullable();
            $table->string('disability_type')->nullable();
            $table->text('medical_report_path')->nullable();
            $table->boolean('is_disabled')->default(false);
            $table->boolean('is_orphan')->default(false);
            $table->enum('residence_status', ['مقيم', 'نازح'])->default('مقيم');
            $table->foreignId('Grade_id')->constrained('grades')->onDelete('cascade');
            $table->foreignId('Classroom_id')->constrained('classrooms')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('Sections')->onDelete('cascade');
            $table->foreignId('blood_id')->constrained('type__bloods')->onDelete('cascade');
            $table->foreignId('parent_id')->constrained('my__parents')->onDelete('cascade');
            $table->foreignId('gender_id')->constrained('genders')->onDelete('cascade');
            $table->foreignId('nationalitie_id')->constrained('nationalities')->onDelete('cascade');
            $table->unsignedBigInteger('original_province_id')->nullable();
            $table->unsignedBigInteger('current_province_id')->nullable();
            $table->foreign('original_province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->foreign('current_province_id')->references('id')->on('provinces')->onDelete('set null');
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
        Schema::dropIfExists('students');
    }
};
