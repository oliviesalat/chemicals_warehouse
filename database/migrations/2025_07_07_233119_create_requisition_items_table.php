<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requisition_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisition_id')->constrained('requisitions');
            $table->foreignId('chemical_product_id')->constrained('chemical_products');
            $table->decimal('requested_quantity', 10, 2);
            $table->foreignId('requested_measure_unit_id')->constrained('measure_units');
            $table->string('item_status');
            $table->decimal('issued_quantity', 10, 2)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requisition_items');
    }
};
