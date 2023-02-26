<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no',200)->index()->nullable();
            $table->bigInteger('user_id')->index()->nullable();
            $table->bigInteger('delivery_address_id')->index()->nullable();
            $table->bigInteger('vendor_id')->index()->nullable();
            $table->decimal('total_price',10,2)->default('0')->nullable();
            $table->decimal('shipping_charge',10,2)->default('0')->nullable();
            $table->tinyInteger('is_paid')->default(0)->comment('0 => Not Paid','1 => Paid')->nullable();
            $table->tinyInteger('payment_method')->default('1')->comment('1 => cod, 2 => paypal')->nullable();
            $table->string('transaction_id',200)->index()->nullable();
            $table->tinyInteger('status')->default('1')->comment('0 => Not Initiated, 1 => processing, 2 => confirmed, 3 => completed, 4 => return, 5 => cancelled, 6 => delivery start')->nullable();
            $table->tinyInteger('return_reason_type')->default('1')->comment('1 =>  refused to accept, 2 => not at home, 3 => did not paid, 4 => address not found')->nullable();
            $table->dateTime('ordered_at')->nullable();
            $table->dateTime('assigned_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->dateTime('payment_received_at')->nullable();
            $table->enum('order_type',['online','offline'])->default('online')->nullable();
            $table->tinyInteger('mode')->default('0')->comment('0 => pick up point','1 => door step')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
