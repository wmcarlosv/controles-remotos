<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('button_code',100)->nullable();
            $table->unsignedBigInteger('block_id');
            $table->unsignedBigInteger('department_id');
            $table->string('number_c',100)->nullable();
            $table->string('button',100)->nullable();
            $table->timestamps();

            $table->foreign('block_id')->references('id')->on('blocks')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
