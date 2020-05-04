<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',255);
            $table->string('customer_name',50);
            $table->integer('checked_id');
            $table->integer('confirmed_id');
            $table->string('phone',50);
            $table->string('address',255);
            $table->longText('image');
            $table->string('category',20);
            $table->string('brand',20);
            $table->text('description');
            $table->integer('model_year');
            $table->integer('import_price');
            $table->enum('status', ['pending', 'confirmed' ,'recreived']);
            $table->date('checked_at');
            $table->date('received_at');
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
        Schema::dropIfExists('verifications');
    }
}
