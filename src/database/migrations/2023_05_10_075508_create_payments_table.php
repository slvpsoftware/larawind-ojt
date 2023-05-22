<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("customer_id");
            $table->string("invoice_id");
            $table->string("checkout_id");
            $table->string("product_id");
            $table->string("prod_price");
            $table->string("prod_quantity");
            $table->string("name_of_card");
            $table->string("card_number");
            $table->string("order_status");
            $table->string("payment_date");
            $table->string("expiry_month");
            $table->string("expiry_year");
            $table->string("cvv");
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
        Schema::dropIfExists('payments');
    }
}
