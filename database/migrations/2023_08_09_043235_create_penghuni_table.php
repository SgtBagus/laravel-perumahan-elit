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
        Schema::create('penghuni', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rumah_id');
            $table->string('nama');
            $table->enum('status', ['Tetap', 'Kontrak'])->default('Tetap');
            $table->date('periode_mulai');
            $table->date('periode_selesai')->nullable();
            $table->timestamps();
    
            $table->foreign('rumah_id')->references('id')->on('rumah');
        });
    
        // Insert data dummy untuk 15 penghuni tetap
        for ($i = 1; $i <= 15; $i++) {
            DB::table('penghuni')->insert([
                'rumah_id' => $i,
                'nama' => 'Penghuni ' . $i,
                'periode_mulai' => now()->subMonths(rand(1, 12)),
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
        Schema::dropIfExists('penghuni');
    }
};
