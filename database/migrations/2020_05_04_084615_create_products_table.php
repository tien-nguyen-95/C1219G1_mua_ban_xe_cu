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
            $table->string('title');
            $table->string('name');
            $table->longText('image');
            $table->integer('model_year');
            $table->integer('register_year');
            $table->integer('miles');
            $table->string('color');
            $table->string('origin');
            $table->integer('import_price');
            $table->integer('export_price');
            $table->enum('status', ['show', 'busy' ,'sold'])->default('show');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('staff_id');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('staff_id')->references('id')->on('staffs');
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
