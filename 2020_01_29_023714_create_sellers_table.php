<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('sub_sector_id');
            $table->unsignedBigInteger('city_id');
            $table->integer('QR_id');
            $table->timestamp('creation_date');
            $table->timestamp('submitted_date');
            $table->timestamp('approval_date');

            $table->foreign('sub_sector_id')
                ->references('id')
                ->on('sub_sectors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
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
        Schema::dropIfExists('sellers');
    }
}
