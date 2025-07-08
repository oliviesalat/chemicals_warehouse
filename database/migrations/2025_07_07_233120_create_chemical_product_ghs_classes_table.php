<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chemical_product_ghs_classes', function (Blueprint $table) {
            $table->foreignId('chemical_product_id')->constrained('chemical_products');
            $table->foreignId('ghs_class_id')->constrained('ghs_classes');
            $table->primary(['chemical_product_id', 'ghs_class_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chemical_product_ghs_classes');
    }
};
