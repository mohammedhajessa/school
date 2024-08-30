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
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('restrict');
                // الفصل الأول
            $table->decimal('oral_grade_first_semester_1')->nullable(); // شفوي
            $table->decimal('oral_grade_first_semester_2')->nullable(); // شفوي
            $table->decimal('oral_grade_first_semester_3')->nullable(); // شفوي
            $table->decimal('homework_grade_first_semester_1')->nullable(); // وظائف
            $table->decimal('homework_grade_first_semester_2')->nullable(); // وظائف
            $table->decimal('homework_grade_first_semester_3')->nullable(); // وظائف
            $table->decimal('quiz_grade_first_semester_1')->nullable(); // مذاكرة
            $table->decimal('quiz_grade_first_semester_2')->nullable(); // مذاكرة
            $table->decimal('quiz_grade_first_semester_3')->nullable(); // مذاكرة
            $table->decimal('total_work_first_1')->nullable(); // المجموع (أعمال الطالب)
            $table->decimal('total_work_first_2')->nullable(); // المجموع (أعمال الطالب)
            $table->decimal('total_work_first_3')->nullable(); // المجموع (أعمال الطالب)
            $table->decimal('average_first_semester_1')->nullable(); // الامتحان الفصلي الأول
            $table->decimal('average_first_semester_2')->nullable(); // الامتحان الفصلي الأول
            $table->decimal('average_first_semester_3')->nullable(); // الامتحان الفصلي الأول
            $table->decimal('total_average_first_semester_1')->nullable(); // المجموع الكلي للفصل الأول
            $table->decimal('degree_first_semester')->nullable(); // المحصلة الأولى
            $table->decimal('rating_first_semester')->nullable(); // المحصلة الأولى

            // الفصل الثاني
            $table->decimal('oral_grade_second_semester_1')->nullable(); // شفوي
            $table->decimal('oral_grade_second_semester_2')->nullable(); // شفوي
            $table->decimal('oral_grade_second_semester_3')->nullable(); // شفوي
            $table->decimal('homework_grade_second_semester_1')->nullable(); // وظائف
            $table->decimal('homework_grade_second_semester_2')->nullable(); // وظائف
            $table->decimal('homework_grade_second_semester_3')->nullable(); // وظائف
            $table->decimal('quiz_grade_second_semester_1')->nullable(); // مذاكرة
            $table->decimal('quiz_grade_second_semester_2')->nullable(); // مذاكرة
            $table->decimal('quiz_grade_second_semester_3')->nullable(); // مذاكرة
            $table->decimal('total_work_second_1')->nullable(); // المجموع (أعمال الطالب)
            $table->decimal('total_work_second_2')->nullable(); // المجموع (أعمال الطالب)
            $table->decimal('total_work_second_3')->nullable(); // المجموع (أعمال الطالب)
            $table->decimal('average_second_semester_1')->nullable(); // الامتحان الفصلي الأول
            $table->decimal('average_second_semester_2')->nullable(); // الامتحان الفصلي الأول
            $table->decimal('average_second_semester_3')->nullable();
            $table->decimal('total_average_second_semester_1')->nullable(); // المجموع الكلي للفصل الأول
            $table->decimal('degree_second_semester')->nullable(); // المحصلة الأولى
            $table->decimal('rating_second_semester')->nullable(); // المحصلة الأولى

            // المحصلة النهائية
            $table->decimal('total_result')->nullable(); // مجموع المحصلتين
            $table->decimal('result_equivalent')->nullable(); // معادل المحصلتين
            $table->decimal('final')->nullable(); // معادل المحصلتين
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
        Schema::dropIfExists('student_subjects');
    }
};

// $table->integer('first_term_coursework')->nullable();
// $table->integer('first_term_exam')->nullable();
// $table->integer('second_term_coursework')->nullable();
// $table->integer('second_term_exam')->nullable();
// $table->integer('first_term_total')->nullable();    // محصلة الفصل الأول لكل مادة
// $table->integer('second_term_total')->nullable();   // محصلة الفصل الثاني لكل مادة
// $table->integer('first_term_overall_total')->nullable();  // المحصلة الكاملة لمواد الفصل الأول
// $table->integer('second_term_overall_total')->nullable(); // المحصلة الكاملة لمواد الفصل الثاني
// $table->decimal('yearly_average', 5, 2)->nullable();   // المعدل السنوي لكل مادة
// $table->decimal('final_score', 5, 2)->nullable();   // المحصلة النهائية للسنة الدراسية
