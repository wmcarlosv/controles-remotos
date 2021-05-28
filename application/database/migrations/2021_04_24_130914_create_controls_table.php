<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('block_id');
            $table->unsignedBigInteger('department_id');
            $table->string('code_a')->nullable(false);
            $table->boolean('status_a')->nullable(false)->default(true);
            $table->string('code_b')->nullable(false);
            $table->boolean('status_b')->nullable(false)->default(true);
            $table->string('code_c')->nullable(false);
            $table->boolean('status_c')->nullable(false)->default(true);
            $table->string('code_d')->nullable(false);
            $table->boolean('status_d')->nullable(false)->default(true);
            $table->string('number_c',100)->nullable();
            $table->boolean('is_active')->nullable(false)->default(true);
            $table->boolean('is_deactive')->nullable(false)->default(false);
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
        Schema::dropIfExists('controls');
    }
}
