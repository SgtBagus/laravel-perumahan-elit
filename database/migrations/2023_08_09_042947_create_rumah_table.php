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
        Schema::create('rumah', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_rumah');
            $table->enum('status', ['Tetap', 'Kosong'])->default('Tetap');
            $table->timestamps();
        });

        // Insert data dummy untuk 15 rumah
        for ($i = 1; $i <= 15; $i++) {
            DB::table('rumah')->insert([
                'nomor_rumah'   => 'Rumah ' . $i,
                'status'        => 'Tetap',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
        }

        // Insert data dummy untuk 5 rumah
        for ($i = 16; $i <= 20; $i++) {
            DB::table('rumah')->insert([
                'nomor_rumah'   => 'Rumah ' . $i,
                'status'        => 'Kosong',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumah');
    }
};
