<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * PostgreSQL tidak membuat index otomatis pada foreign key column.
     * Index campaign_id diperlukan untuk mempercepat query relasi & filter per campaign.
     */
    public function up(): void
    {
        Schema::table('aid_requests', function (Blueprint $table) {
            $table->index('campaign_id');
        });
    }

    public function down(): void
    {
        Schema::table('aid_requests', function (Blueprint $table) {
            $table->dropIndex(['campaign_id']);
        });
    }
};
