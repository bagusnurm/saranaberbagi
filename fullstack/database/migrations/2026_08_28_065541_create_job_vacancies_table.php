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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->longText('requirements')->nullable();
            $table->string('location')->nullable();
            $table->enum('employment_type', ['fulltime', 'parttime', 'volunteer'])->default('fulltime');
            $table->date('deadline')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
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
        Schema::dropIfExists('job_vacancies');
    }
};
