<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyGuaranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guarantees', function (Blueprint $table) {
            $table->foreign('customer_id','guarantee_fk_customer')->references('id')->on('customers');
            $table->foreign('staff_id','guarantee_fk_staff')->references('id')->on('staffs');
            $table->foreign('product_id','guarantee_fk_product')->references('id')->on('products');
            $table->foreign('branch_id','guarantee_fk_branch')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guarantees', function (Blueprint $table) {
            $table->dropForeign('guarantee_fk_customer');
            $table->dropForeign('guarantee_fk_staff');
            $table->dropForeign('guarantee_fk_product');
            $table->dropForeign('guarantee_fk_branch');
        });
    }
}
