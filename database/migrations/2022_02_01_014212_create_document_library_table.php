<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_library', function (Blueprint $table) {
            $table->id();
            $table->string('title',300)->nullable();
            $table->text('document')->nullable();
            $table->tinyInteger('document_type')->default('0')->nullable()->comment('0 => Document, 1 => Video');
            $table->bigInteger('created_by')->unsigned()->index()->nullable();
            $table->bigInteger('updated_by')->unsigned()->index()->nullable();
            $table->tinyInteger('status')->default('1')->nullable()->comment('0 => Inactive, 1 => Active, 9 => Deleted');
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('document_library');
    }
}
