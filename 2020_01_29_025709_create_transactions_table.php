<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wallet_id');
            $table->unsignedBigInteger('sub_wallet_id');
            $table->unsignedBigInteger('invoice_id')->unique();
            $table->unsignedBigInteger('seller_branch_id');
            $table->integer('amount');
            $table->string('state');

            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('sub_wallet_id')
                ->references('id')
                ->on('sub_wallets')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('seller_branch_id')
                ->references('id')
                ->on('seller_branches')
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
        Schema::dropIfExists('transactions');
    }
}
