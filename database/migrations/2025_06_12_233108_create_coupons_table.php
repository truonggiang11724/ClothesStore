<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();          // Mã giảm giá
            $table->enum('type', ['fixed', 'percent']); // Loại: số tiền cố định hoặc %
            $table->decimal('value', 10, 2);           // Giá trị giảm
            $table->integer('usage_limit')->nullable(); // Số lần sử dụng tối đa
            $table->timestamp('expires_at')->nullable(); // Hết hạn
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
