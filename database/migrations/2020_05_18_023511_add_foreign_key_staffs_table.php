<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->foreign('user_id', 'staff_fk_user')->references('id')->on('users');
            $table->foreign('position_id', 'staff_fk_position')->references('id')->on('positions');
            $table->foreign('branch_id', 'staff_fk_branch')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->dropForeign('staff_fk_user');
            $table->dropForeign('staff_fk_position');
            $table->dropForeign('staff_fk_branch');
        });
    }
}
