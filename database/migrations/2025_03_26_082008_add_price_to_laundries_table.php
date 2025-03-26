<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_add_price_to_laundries_table.php
    public function up()
    {
        Schema::table('laundries', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->default(4); // ベース料金4$
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laundries', function (Blueprint $table) {
            //
        });
    }
};
