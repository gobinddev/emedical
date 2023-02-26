<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('business_name',200)->nullable();
            $table->text('address_line_1',200)->nullable();
            $table->text('address_line_2',200)->nullable();
            $table->bigInteger('country_id')->unsigned()->index()->nullable();
            $table->bigInteger('state_id')->unsigned()->index()->nullable();
            $table->bigInteger('city_id')->unsigned()->index()->nullable();
            $table->string('pincode',100)->nullable();
            $table->string('first_name',200)->nullable();
            $table->string('last_name',200)->nullable();
            $table->string('name',200)->nullable();
            $table->string('phone_code',200)->nullable();
            $table->string('phone',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('password',255)->nullable();
            $table->string('geo_address',200)->nullable();
            $table->string('geo_city',200)->nullable();
            $table->string('latitude',255)->nullable();
            $table->string('longitude',255)->nullable();
            $table->bigInteger('created_by')->unsigned()->index()->nullable();
            $table->bigInteger('updated_by')->unsigned()->index()->nullable();
            $table->tinyInteger('status')->default('1')->nullable()->comment('0 => Inactive, 1 => Active, 9 => Deleted');
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
        Schema::dropIfExists('vendors');
    }
}
