<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('amount');
            $table->string('sectors')->nullable();
            $table->timestamp('time')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('employee_id')->unique();
            $table->unsignedBigInteger('risponsibles_id');
            $table->unsignedBigInteger('wallet_id');
            $table->integer('sub_w_Num');

            $table->foreign('risponsibles_id')
                ->references('id')
                ->on('risponsibles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('sub_wallets');
    }
}
