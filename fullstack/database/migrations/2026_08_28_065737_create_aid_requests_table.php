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
        Schema::create('aid_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->nullable()->constrained('campaigns')->nullOnDelete();
            $table->string('applicant_name');
            $table->string('phone');
            $table->text('address');
            // Kolom legacy dari versi awal form — masih dipakai di Filament (ViewAidRequest)
            $table->string('aid_type')->nullable();
            $table->text('description')->nullable();
            $table->string('supporting_document')->nullable();
            // String (bukan enum DB) disengaja: PostgreSQL memerlukan ALTER TYPE saat opsi enum berubah;
            // validasi nilai dijaga di layer aplikasi (Controller + Filament)
            $table->string('status')->default('pending');
            $table->text('admin_note')->nullable();
            // TEXT langsung disiapkan untuk ciphertext cast 'encrypted' (200+ karakter)
            $table->text('nik')->nullable();
            $table->text('kk_number')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender')->default('male');
            $table->string('occupation')->nullable();
            $table->string('marital_status')->default('belum_menikah');
            $table->boolean('is_mualaf')->default(false);
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('village')->nullable();
            $table->json('photos')->nullable();
            $table->json('videos')->nullable();
            $table->decimal('fund_needed', 15, 2)->default(0);
            $table->string('bank_name')->nullable();
            // TEXT untuk ciphertext cast 'encrypted'
            $table->text('bank_account_number')->nullable();
            $table->string('bank_account_holder')->nullable();
            $table->timestamps();

            // PostgreSQL tidak auto-index FK & kolom filter — index eksplisit dibutuhkan untuk performa query
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_requests');
    }
};
