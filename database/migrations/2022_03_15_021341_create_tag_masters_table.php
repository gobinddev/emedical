<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name',200)->nullable();
            $table->text('description')->nullable();
            $table->string('file_name')->nullable();
            $table->tinyInteger('status')->default('1')->comment('0 => Inactive, 1 => Active, 9 => Active')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_masters');
    }
}
