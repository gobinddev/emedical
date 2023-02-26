<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->index()->nullable();
            $table->string('name',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('phone',200)->nullable();
            $table->text('address_line_1')->nullable();
            $table->text('address_line_2')->nullable();
            $table->bigInteger('country_id')->unsigned()->index()->nullable();
            $table->bigInteger('state_id')->unsigned()->index()->nullable();
            $table->bigInteger('city_id')->unsigned()->index()->nullable();
            $table->string('pincode',200)->nullable();
            $table->string('landmark',200)->nullable();
            $table->string('geo_address',200)->nullable();
            $table->string('geo_city',200)->nullable();
            $table->string('latitude',200)->nullable();
            $table->string('longitude',200)->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 => inactive, 1 => active, 9 => Deleted')->nullable();
            $table->tinyInteger('is_default')->default('0')->nullable();
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
        Schema::dropIfExists('customer_addresses');
    }
}
