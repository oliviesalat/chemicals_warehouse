<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receipt_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained('receipts');
            $table->foreignId('chemical_product_id')->constrained('chemical_products');
            $table->decimal('received_quantity', 10, 2);
            $table->foreignId('measure_unit_id')->constrained('measure_units');
            $table->foreignId('stored_item_id')->nullable()->constrained('stored_items');
            $table->string('batch_number')->nullable();
            $table->date('expiration')->nullable();
            $table->text('note')->nullable();
            $table->foreignId('funding_source_id')->nullable()->constrained('funding_sources');
            $table->boolean('from_framework_agreement')->default(false);
            $table->foreignId('purchase_order_item_id')->nullable()->constrained('purchase_order_items');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receipt_items');
    }
};
