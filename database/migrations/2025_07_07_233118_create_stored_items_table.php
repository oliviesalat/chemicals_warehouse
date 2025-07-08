<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stored_items', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturer')->nullable();
            $table->string('batch')->nullable();
            $table->date('expiration')->nullable();
            $table->string('store_place')->nullable();
            $table->text('note')->nullable();
            $table->string('sds')->nullable();
            $table->foreignId('measure_unit_id')->constrained('measure_units');
            $table->decimal('quantity_per_unit', 10, 2);
            $table->integer('number_of_units');
            $table->foreignId('responsible_user_id')->nullable()->constrained('users');
            $table->json('additional_properties')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stored_items');
    }
};
