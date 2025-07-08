<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requisition_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisition_id')->constrained('requisitions');
            $table->foreignId('approver_user_id')->constrained('users');
            $table->timestamp('approval_date')->useCurrent();
            $table->string('status');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requisition_approvals');
    }
};
