<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('Sections', function(Blueprint $table) {
			$table->id();
			$table->string('Name', 50);
			$table->timestamps();
			$table->bigInteger('Grade_id')->unsigned();
			$table->bigInteger('Class_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Sections');
	}
}
