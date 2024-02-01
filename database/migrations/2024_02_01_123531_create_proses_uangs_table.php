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
        Schema::create('proses_uangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('nama_proses');
            $table->unsignedInteger('type_proses');
            $table->double('nominal');
            $table->bigInteger('model_id')->nullable();
            $table->string('model_type')->nullable();
            $table->foreignIdFor(User::class, 'user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses_uangs');
    }
};
