<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->unsigned()->nullable();
            $table->foreign('role')->references('id')->on('user_roles')->onDelete('set null');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [ 'name' => 'Root', 'username' => 'root', 'email'=>'root@email.com', 'password'=>Hash::make('root123'), 'role'=>'1' ],
            [ 'name' => 'Admin', 'username' => 'admin', 'email'=>'admin@email.com', 'password'=>Hash::make('admin123'), 'role'=>'2' ],
            [ 'name' => 'Shop', 'username' => 'shop', 'email'=>'shop@email.com', 'password'=>Hash::make('shop123'), 'role'=>'3' ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
