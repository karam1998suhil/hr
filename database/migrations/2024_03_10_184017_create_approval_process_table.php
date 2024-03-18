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
        Schema::create('approval_process', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_detail_id')->constrained()->onDelete('cascade');
            $table->foreignId('submitted_by')->constrained('employees');
            $table->foreignId('reviewed_by')->constrained('employees');
            $table->enum('status', ['Pending', 'Approved', 'Rejected']);
            $table->text('approval_comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_process');
    }
};
