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
            $table->string('applicant_name');
            $table->string('phone');
            $table->text('address');
            $table->string('aid_type');
            $table->text('description');
            $table->string('supporting_document')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected', 'disbursed'])->default('pending');
            $table->text('admin_note')->nullable();
            $table->timestamps();
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
