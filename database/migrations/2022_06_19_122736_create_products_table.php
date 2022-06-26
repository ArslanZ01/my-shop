<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('category')->unsigned()->nullable();
            $table->foreign('category')->references('id')->on('product_categories')->onDelete('set null');
            $table->timestamps();
        });

        DB::table('products')->insert([
            [ 'id' => 0, 'name' => 'Mobile', 'price' => 0, 'category' => 0 ],
        ]);
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
};
