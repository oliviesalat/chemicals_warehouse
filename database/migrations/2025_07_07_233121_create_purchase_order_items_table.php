<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained('purchase_orders');
            $table->decimal('ordered_quantity', 10, 2);
            $table->foreignId('chemical_product_id')->constrained('chemical_products');
            $table->foreignId('ordered_measure_unit_id')->constrained('measure_units');
            $table->text('note')->nullable();
            $table->foreignId('requisition_item_id')->nullable()->constrained('requisition_items');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_order_items');
    }
};
