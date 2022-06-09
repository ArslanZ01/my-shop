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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('description');
        });

        DB::table('user_roles')->insert([
            [ 'id' => 0, 'description' => 'Empty' ],
            [ 'id' => 1, 'description' => 'Root' ],
            [ 'id' => 2, 'description' => 'Admin' ],
            [ 'id' => 3, 'description' => 'Shop' ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
};
