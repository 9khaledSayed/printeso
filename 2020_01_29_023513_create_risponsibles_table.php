<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisponsiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risponsibles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->unique();
            $table->unsignedBigInteger('seller_branch_id');
            $table->string('name');
            $table->unsignedDecimal('phone');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('location');
            $table->timestamp('creation_date');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            /*seller_branch has many responsible*/
            /*
              ALTER TABLE risponsibles
              ADD FOREIGN KEY (seller_branch_id) REFERENCES seller_branches(id);
            */
//            $table->foreign('seller_branch_id')
//                ->references('id')
//                ->on('seller_branches')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
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
        Schema::dropIfExists('risponsibles');
    }
}
