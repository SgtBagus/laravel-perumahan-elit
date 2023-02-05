<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('email')->unique();
            $table->string('role');
            $table->text('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $defaultUserRows = [
            [
                'name'          => 'Admin',
                'email'         => 'admin@admin.com',
                'role'          => 'admin',
                'address'       => 'Ini Alamat Admin',
                'password'      => Hash::make('123456'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Casher',
                'email'         => 'casher@casher.com',
                'role'          => 'casher',
                'address'       => 'Ini Alamat Casher',
                'password'      => Hash::make('123456'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Noted',
                'email'         => 'noted@noted.com',
                'role'          => 'noted',
                'address'       => 'Ini Alamat Noted',
                'password'      => Hash::make('123456'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'User',
                'email'         => 'user@user.com',
                'role'          => 'user',
                'address'       => 'Ini Alamat Casher',
                'password'      => Hash::make('123456'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        DB::table('users')->insert($defaultUserRows);
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
