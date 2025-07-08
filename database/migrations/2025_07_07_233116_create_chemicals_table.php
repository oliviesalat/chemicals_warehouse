<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chemicals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('formula')->nullable();
            $table->string('cas')->nullable();
            $table->foreignId('chemical_category_id')->constrained('chemical_categories');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chemicals');
    }
};
