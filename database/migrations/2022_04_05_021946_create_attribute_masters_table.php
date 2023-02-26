<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name',200)->nullable();
            $table->bigInteger('type_id')->nullable();
            $table->tinyInteger('list_order')->unsigned()->default(0)->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 => Inactive, 1 => Active, 9 => Deleted')->nullable();
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
        Schema::dropIfExists('attribute_masters');
    }
}
