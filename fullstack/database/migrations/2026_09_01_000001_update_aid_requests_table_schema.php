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
        Schema::table('aid_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('aid_requests', 'campaign_id')) {
                $table->foreignId('campaign_id')->nullable()->constrained('campaigns')->nullOnDelete();
            }
            if (!Schema::hasColumn('aid_requests', 'nik')) {
                $table->string('nik', 16)->nullable()->after('applicant_name');
            }
            if (!Schema::hasColumn('aid_requests', 'kk_number')) {
                $table->string('kk_number', 16)->nullable()->after('nik');
            }
            if (!Schema::hasColumn('aid_requests', 'birthdate')) {
                $table->date('birthdate')->nullable()->after('kk_number');
            }
            if (!Schema::hasColumn('aid_requests', 'gender')) {
                $table->string('gender')->default('male')->after('birthdate');
            }
            if (!Schema::hasColumn('aid_requests', 'occupation')) {
                $table->string('occupation')->nullable()->after('gender');
            }
            if (!Schema::hasColumn('aid_requests', 'marital_status')) {
                $table->string('marital_status')->default('belum_menikah')->after('occupation');
            }
            if (!Schema::hasColumn('aid_requests', 'is_mualaf')) {
                $table->boolean('is_mualaf')->default(false)->after('marital_status');
            }
            if (!Schema::hasColumn('aid_requests', 'province')) {
                $table->string('province')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('aid_requests', 'city')) {
                $table->string('city')->nullable()->after('province');
            }
            if (!Schema::hasColumn('aid_requests', 'village')) {
                $table->string('village')->nullable()->after('city');
            }
            if (!Schema::hasColumn('aid_requests', 'photos')) {
                $table->json('photos')->nullable()->after('address');
            }
            if (!Schema::hasColumn('aid_requests', 'videos')) {
                $table->json('videos')->nullable()->after('photos');
            }
            if (!Schema::hasColumn('aid_requests', 'fund_needed')) {
                $table->decimal('fund_needed', 15, 2)->default(0)->after('videos');
            }
            if (!Schema::hasColumn('aid_requests', 'bank_name')) {
                $table->string('bank_name')->nullable()->after('fund_needed');
            }
            if (!Schema::hasColumn('aid_requests', 'bank_account_number')) {
                $table->string('bank_account_number')->nullable()->after('bank_name');
            }
            if (!Schema::hasColumn('aid_requests', 'bank_account_holder')) {
                $table->string('bank_account_holder')->nullable()->after('bank_account_number');
            }
            if (Schema::hasColumn('aid_requests', 'aid_type')) {
                $table->string('aid_type')->nullable()->change();
            }
            if (Schema::hasColumn('aid_requests', 'supporting_document')) {
                $table->string('supporting_document')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aid_requests', function (Blueprint $table) {
            // Rollback columns if needed
        });
    }
};
