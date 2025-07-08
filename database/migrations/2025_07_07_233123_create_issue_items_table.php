<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('issue_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('issue_id')->constrained('issues');
            $table->foreignId('requisition_item_id')->nullable()->constrained('requisition_items');
            $table->foreignId('stored_item_id')->constrained('stored_items');
            $table->decimal('issued_quantity', 10, 2);
            $table->foreignId('measure_unit_id')->constrained('measure_units');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('issue_items');
    }
};
