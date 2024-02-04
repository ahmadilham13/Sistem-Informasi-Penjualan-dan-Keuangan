<?php

use App\Models\User;
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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('type');
            $table->foreignIdFor(User::class, 'user_id');
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->unsignedBigInteger('product_bibits_id')->nullable();
            $table->unsignedBigInteger('modal_id')->nullable();
            $table->unsignedBigInteger('transaksi_id')->nullable();
            $table->timestamps();

            $table->foreign('petugas_id')->references('id')->on('users');
            $table->foreign('product_bibits_id')->references('id')->on('product_bibits');
            $table->foreign('modal_id')->references('id')->on('modals');
            $table->foreign('transaksi_id')->references('id')->on('transaksis');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
