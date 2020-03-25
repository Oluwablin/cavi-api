<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('context')->nullable();
            $table->string('text')->nullable();
            $table->date('date')->nullable();
            $table->enum('select', ['Oficemate', 'CV'])->nullable();
            $table->enum('radio_button', ['Frontend', 'Backend', 'Devops'])->nullable();
            $table->enum('check_boxes', ['Expert', 'Intermediate', 'Beginner'])->nullable();
            $table->text('text_area')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
