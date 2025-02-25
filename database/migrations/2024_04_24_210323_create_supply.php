<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supply', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('price');
            $table->string('name',length:50);
            $table->foreignId('dep_id')->constrained('shipping_dep');
            $table->foreignId('supplier_id')->constrained('supplier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply');
    }
};
