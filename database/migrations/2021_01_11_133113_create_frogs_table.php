<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('gender'); //1 = Male, 2 = Female
            $table->date('dob')->nullable();
            $table->date('dod')->nullable();
            $table->foreignId('type_id');
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
        Schema::dropIfExists('frogs');
    }
}
