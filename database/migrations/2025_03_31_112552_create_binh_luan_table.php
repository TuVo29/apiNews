<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('binh_luan', function (Blueprint $table) {
            $table->id('Id_binhluan');
            $table->string('email');
            $table->timestamp('Thoigian');
            $table->text('Noidung');
            $table->boolean('Trangthai')->default(true);
            $table->foreignId('Id_tin')->constrained('tin', 'Id_tin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luan');
    }
};
