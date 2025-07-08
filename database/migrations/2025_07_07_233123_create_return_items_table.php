<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('return_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('return_id')->constrained('returns');
            $table->foreignId('original_issue_item_id')->constrained('issue_items');
            $table->foreignId('stored_item_id')->constrained('stored_items');
            $table->decimal('returned_quantity', 10, 2);
            $table->foreignId('measure_unit_id')->constrained('measure_units');
            $table->string('condition')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('return_items');
    }
};
