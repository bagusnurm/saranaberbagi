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
        Schema::create('campaign_comments', function (Blueprint $table) {
            $table->id();
            // Slug program yang dikomentari (mis. "berbagi-al-quran").
            // Pakai string, bukan FK, supaya komentar aman saat program berubah slug.
            $table->string('program_slug', 191)->index();
            $table->string('name', 100);
            $table->string('email', 191)->nullable();
            $table->text('content');
            $table->boolean('is_approved')->default(true)->index();
            $table->timestamps();

            $table->index(['program_slug', 'is_approved', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_comments');
    }
};
