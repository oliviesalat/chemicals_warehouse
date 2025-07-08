<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ghs_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol_code')->nullable();
            $table->text('description')->nullable();
            $table->string('pictogram_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ghs_classes');
    }
};
