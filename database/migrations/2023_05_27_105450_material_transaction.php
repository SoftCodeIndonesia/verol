<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MaterialTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('transaction_id');
            $table->string('satuan')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('actual')->default(0);
            $table->integer('selisih')->default(0);
            $table->integer('created_at');

            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade');;
            $table->foreign('material_id')->references('id')->on('material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_transaction');
    }
}