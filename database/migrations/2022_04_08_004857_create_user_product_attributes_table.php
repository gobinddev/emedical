<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_product_attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->index();
            $table->string('attribute_id',200)->nullable();
            $table->string('sku',200)->nullable();
            $table->decimal('price',10,2)->default(0)->nullable();
            $table->decimal('discounted_price',10,2)->default(0)->nullable();
            $table->bigInteger('quantity')->unsigned()->default(0)->nullable();
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
        Schema::dropIfExists('user_product_attributes');
    }
}
