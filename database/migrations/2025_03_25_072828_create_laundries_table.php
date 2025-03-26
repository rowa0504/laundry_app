<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('laundries', function (Blueprint $table) {
            $table->id();
            $table->string('user_name'); // ユーザーの名前
            $table->enum('role', ['student', 'teacher']); // 学生 or 先生
            $table->string('pickup_code', 6)->unique(); // 6桁の受け取りコード
            $table->integer('units'); // 洗濯物のユニット数（1ユニット = 5kg）
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('laundries');
    }
};
