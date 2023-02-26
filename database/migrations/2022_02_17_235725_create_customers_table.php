<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',200)->nullable();
            $table->string('last_name',200)->nullable();
            $table->string('display_name',200)->nullable();
            $table->string('email',200)->unique()->nullable();
            $table->string('phone',200)->nullable();
            $table->string('password',255)->nullable();
            $table->string('image',200)->nullable();
            $table->rememberToken();
            $table->text('email_verification_token')->nullable();
            $table->tinyInteger('is_email_verified')->default(0)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 => inactive, 1=> active, 9 => Deleted')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
