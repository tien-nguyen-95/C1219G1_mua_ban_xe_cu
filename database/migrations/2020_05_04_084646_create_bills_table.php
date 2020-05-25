<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->integer('staff_id');
            $table->integer('branch_id');
            $table->integer('deposit');// tiền đặt cọc
            $table->integer('payment');// tổng tiền phải trả
            $table->boolean('status'); // hóa đơn mua:true, hóa đơn bán:false
            $table->boolean('complete'); // true:đá hoàn thành kiểm tra thanh toán
            $table->date('payment_at');
            $table->date('delivered_at');
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
        Schema::dropIfExists('bills');
    }
}
