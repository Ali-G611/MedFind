<?php

use App\Models\User;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->date('expire_date');
            $table->unsignedInteger('price');
            $table->boolean('prescription_requirment')->default(0);
            $table->unsignedInteger('on_stock_quantity');
            $table->string('details');
            $table->string('photo');
            $table->foreignId('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
