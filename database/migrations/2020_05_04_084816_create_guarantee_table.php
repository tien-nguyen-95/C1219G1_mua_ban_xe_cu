<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuaranteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('staff_id');
            $table->integer('product_id');
            $table->string('issue',255);
            $table->integer('branch_id');
            $table->date('date_in');
            $table->date('date_out');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guarantee');
    }
}
