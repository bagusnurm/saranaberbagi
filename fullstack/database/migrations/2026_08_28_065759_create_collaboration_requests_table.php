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
        Schema::create('collaboration_requests', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('collaboration_type');
            $table->longText('proposal_description');
            $table->string('attachment')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'approved', 'rejected'])->default('pending');
            $table->text('admin_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaboration_requests');
    }
};
