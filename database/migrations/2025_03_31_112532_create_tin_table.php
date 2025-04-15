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
        Schema::create('tin', function (Blueprint $table) {
            $table->id('Id_tin');
            $table->string('Tieude');
            $table->string('Hinhdaidien')->nullable();
            $table->text('Mota');
            $table->longText('Noidung');
            $table->timestamp('Ngaydangtin');
            $table->string('Tacgia');
            $table->integer('Solanxem')->default(0);
            $table->boolean('Tinhot')->default(false);
            $table->boolean('Trangthai')->default(true);
            $table->foreignId('Id_loaitin')->constrained('loai_tin', 'Id_loaitin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin');
    }
};
