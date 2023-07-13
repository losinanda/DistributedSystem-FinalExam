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
        Schema::create('lendings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->primary('lend_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Belum dikembalikan', 'Sudah dikembalikan'])->default('Belum dikembalikan');
            $table->foreignUuid('admin_id')->references('id')->on('admins')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('member_id')->references('id')->on('members')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('book_id')->references('id')->on('books')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lendings');
    }
};
