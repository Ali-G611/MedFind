<?php

use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use App\Models\ShippingDep;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date')->nullable(false);
            $table->date('deliver_date')->nullable();
            $table->unsignedInteger('total_cost')->nullable(false);
            $table->foreignIdFor(Customer::class);
            $table->foreignIdFor(ShippingDep::class);
            $table->timestamps();
        });

        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Item::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'cart' table first to avoid foreign key constraint violations
        Schema::dropIfExists('cart');
        
        // Now drop the 'orders' table
        Schema::dropIfExists('orders');
    }
};
