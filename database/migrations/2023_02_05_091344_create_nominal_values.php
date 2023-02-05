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
        Schema::create('nominal_values', function (Blueprint $table) {
            $table->id();
            $table->float('value', 8, 2);
            $table->text('note')->nullable();
            $table->timestamps();
        });

        DB::table('nominal_values')->insert(
            array(
                'value' => '5000.00',
                'note' => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            )
        );
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
