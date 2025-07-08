<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->date('receipt_date');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers');
            $table->foreignId('purchase_order_id')->nullable()->constrained('purchase_orders');
            $table->foreignId('requisition_id')->nullable()->constrained('requisitions');
            $table->string('receipt_number')->nullable();
            $table->foreignId('received_by_user_id')->constrained('users');
            $table->string('status');
            $table->text('note')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
