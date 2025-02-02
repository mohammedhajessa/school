<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('classrooms', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('Sections', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Sections', function(Blueprint $table) {
			$table->foreign('Class_id')->references('id')->on('Classrooms')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		// Schema::table('students', function(Blueprint $table) {
		// 	$table->foreign('Failed_id')->references('id')->on('failed_classes')
		// 				->onDelete('cascade')
		// 				->onUpdate('cascade');
		// });
	}

	public function down()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->dropForeign('Classrooms_Grade_id_foreign');
		});
        Schema::table('Sections', function(Blueprint $table) {
			$table->dropForeign('Sections_Grade_id_foreign');
		});
		Schema::table('Sections', function(Blueprint $table) {
			$table->dropForeign('Sections_Class_id_foreign');
		});
	}
}
