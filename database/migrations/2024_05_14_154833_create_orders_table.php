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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('c_name');
            $table->string('c_phone');
            $table->string('email')->nullable();
            $table->string('area');
            $table->text('address');
            $table->double('price');
            $table->string('status')->default('pending');
            $table->string('currier_name')->nullable();
            $table->string('customer_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
