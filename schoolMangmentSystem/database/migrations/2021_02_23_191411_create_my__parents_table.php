<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my__parents', function (Blueprint $table) {
            $table->id();
            //Fatherinformation
            $table->string('Name_Father');
            $table->string('Name_Mother');
            $table->string('Name_Grand');
            $table->string('National_ID_Father');
            $table->string('National_ID_Mother');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            $table->string('Nationality_Father');
            $table->string('Nationality_Mother');
            $table->string('Blood_Type_Father')->nullable();
            $table->string('Blood_Type_Mother')->nullable();
            $table->string('Phone_Mother');
            $table->string('email');
            $table->string('Password');
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
        Schema::dropIfExists('my__parents');
    }
}
