<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->boolean('my_day')->nullable();
            $table->string('reminder')->nullable();
            $table->string('due_date')->nullable();
            $table->string('repeat')->nullable();
            $table->text('note')->nullable();
            $table->boolean('important')->nullable();
            $table->boolean('completed')->nullable();
            $table->unsignedBigInteger('to_do_id');
            $table->foreign('to_do_id')->references('id')->on('to_dos')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
