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
            $table->string('nik', 16);                        
            $table->string('kk_number', 16);                  
            $table->date('birthdate');                         
            $table->enum('gender', ['male', 'female']);        
            $table->string('occupation')->nullable();         
            $table->enum('marital_status', [
                'belum_menikah', 'menikah', 'cerai_hidup', 'cerai_mati',
            ]);
            $table->boolean('is_mualaf')->default(false);      
            $table->string('phone');                            
            $table->string('province');                         
            $table->string('city');                             
            $table->string('village');                          
            $table->text('address');                            
            $table->json('photos')->nullable();
            $table->json('videos')->nullable();
            $table->decimal('fund_needed', 15, 2);             
            $table->string('bank_account_number');               
            $table->string('bank_name');                         
            $table->string('bank_account_holder');               
            $table->text('description')->nullable();
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
