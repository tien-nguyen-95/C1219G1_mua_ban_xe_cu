<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',20);
            $table->string('name',255);
            $table->longText('image');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('tag_id');
            $table->integer('model_year');
            $table->integer('import_price');
            $table->integer('export_price');
            $table->integer('branch_id');
            $table->enum('status', ['show', 'busy' ,'sold'])->default('show');
            $table->integer('staff_id');
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
        Schema::dropIfExists('products');
    }
}
