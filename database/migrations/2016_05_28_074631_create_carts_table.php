<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_order')
            $table->string('code');
            $table->string('codemerk');
            $table->string('codejenis');
            $table->string('jenis');
            $table->string('codeproduct');
            $table->string('desc');
            $table->string('price');
            $table->string('image1');
            $table->integer('b');
            $table->decimal('total', 10, 2);
            $table->decimal('subtotal', 10, 2);
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
        Schema::drop('carts');
    }
}
