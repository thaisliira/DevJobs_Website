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
        Schema::table('job_listings', function (Blueprint $table) {
           
        $table->enum('work_type', ['remote', 'hybrid', 'onsite'])->default('onsite')->after('salary');
        $table->text('requirements')->nullable()->after('work_type');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
        $table->dropColumn(['work_type', 'requirements']);
        });
    }
};
