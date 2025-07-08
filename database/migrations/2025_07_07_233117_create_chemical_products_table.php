<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chemical_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chemical_id')->constrained('chemicals');
            $table->string('purity')->nullable();
            $table->string('status')->nullable();
            $table->string('storage_conditions')->nullable();
            $table->integer('issue_limit_per_user')->nullable();
            $table->foreignId('limit_measure_unit_id')->nullable()->constrained('measure_units');
            $table->boolean('is_toxic')->default(false);
            $table->text('note')->nullable();
            $table->integer('min_stock_level')->nullable();
            $table->foreignId('min_stock_measure_unit_id')->nullable()->constrained('measure_units');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chemical_products');
    }
};
