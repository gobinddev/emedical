<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_products', function (Blueprint $table) {
            $table->id();
            $table->string('category_id',100)->nullable();
            $table->bigInteger('brand_id')->unsigned()->index()->nullable();
            $table->string('sku',100)->nullable();
            $table->string('product_title',200)->nullable();
            $table->decimal('price',10,2)->default(0)->nullable();
            $table->decimal('discounted_price',10,2)->default(0)->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('specification')->nullable();
            $table->bigInteger('quantity')->unsigned()->nullable();
            $table->text('in_box')->nullable();
            $table->tinyInteger('is_popular')->default(0)->comment('0 => No, 1 => Yes')->nullable();
            $table->tinyInteger('is_return')->default(0)->comment('0 => No, 1 => Yes')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 => Inactive, 1 => Active, 9 => Delete')->nullable();
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
        Schema::dropIfExists('user_products');
    }
}
