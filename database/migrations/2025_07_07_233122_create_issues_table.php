<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->date('issue_date');
            $table->string('issue_number')->nullable();
            $table->foreignId('issued_by_user_id')->constrained('users');
            $table->foreignId('requisition_id')->nullable()->constrained('requisitions');
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('organisation_id')->constrained('organisations');
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users');
            $table->string('status');
            $table->text('notes')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
