<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('short_description')->nullable();
            $table->longtext('description')->nullable();
            $table->string('thumbnail',200)->nullable();
            $table->string('video',200)->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 => InActive, 1 => Active, 9 => Deleted')->nullable();
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
        Schema::dropIfExists('academies');
    }
}
