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
    public function up() {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penghuni_id');
            $table->date('bulan');
            $table->unsignedSmallInteger('tahun');
            $table->enum('status', ['Lunas', 'Belum Lunas']);
            $table->timestamps();
    
            $table->foreign('penghuni_id')->references('id')->on('penghuni');
        });

        // Insert data dummy untuk pembayaran penghuni tetap
        $penghuniTetap = DB::table('penghuni')->where('status', 'Tetap')->get();
        foreach ($penghuniTetap as $penghuni) {
            DB::table('pembayaran')->insert([
                'penghuni_id'   => $penghuni->id,
                'bulan'         => now()->subMonths(rand(1, 12)),
                'tahun'         => date('Y'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
        }

        Schema::create('pembayaran_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembayaran_id');
            $table->unsignedBigInteger('rumah_id');
            $table->unsignedBigInteger('jenis_pembayaran_id');
            $table->enum('jenis', ['Satpam', 'Kebersihan']);
            $table->decimal('jumlah', 8, 2);
            $table->enum('status', ['Lunas', 'Belum Lunas']);
            $table->timestamps();
    
            $table->foreign('pembayaran_id')->references('id')->on('pembayaran');
            $table->foreign('rumah_id')->references('id')->on('rumah');
            $table->foreign('jenis_pembayaran_id')->references('id')->on('jenis_pembayaran');
        });

        $pembayarans = DB::table('pembayaran')->get();
        
        foreach ($pembayarans as $pembayaran) {
            DB::table('pembayaran_detail')->insert([
                'pembayaran_id'             => $pembayaran->id,
                'rumah_id'                  => $pembayaran->id,
                'jenis_pembayaran_id'       => '1',
                'jenis'                     => 'Kebersihan',
                'jumlah'                    => '15000',
                'status'                    => 'Lunas',
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s'),
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
        Schema::dropIfExists('pembayaran');
    }
};
