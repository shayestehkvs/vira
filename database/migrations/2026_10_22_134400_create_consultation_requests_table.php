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
        Schema::create('consultation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone', 20);
            $table->string('company_name')->nullable();
            $table->string('service_type');
            $table->string('target_area')->nullable();
            $table->string('campaign_duration')->nullable();
            $table->text('message')->nullable();
            $table->string('status', 32)->default('new')->index();
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->index('created_at');
            $table->index(['phone', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_requests');
    }
};
