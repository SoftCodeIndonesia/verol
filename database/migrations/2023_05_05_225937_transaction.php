<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->integer('quantity')->default(1);

            // 0 = keluar
            // 1 = masuk

            $table->integer('type')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->integer('created_at');

            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('material_id')->references('id')->on('material')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}