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
        Schema::create('jenis_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('value_title');
            $table->float('value', 8, 2);
            $table->text('note')->nullable();
            $table->enum('status', ['Active', 'Deactive'])->default('Active');
            $table->timestamps();
        });

        $defaultUserRows = [
            [
                'value_title'   => 'Satpam',
                'value'         => '100000.00',
                'note'          => 'Ini jumlah biaya untuk satpam',
                'status'        => 'Active',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'value_title'   => 'Kebersihan',
                'value'         => '150000.00',
                'note'          => 'Ini jumlah biaya untuk Kebersihan',
                'status'        => 'Active',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        DB::table('jenis_pembayaran')->insert($defaultUserRows);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('nominal_values');
    }
};
