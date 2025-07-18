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
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("vendor_id")->constrained()->cascadeOnDelete();
            $table->foreignId("available_address_id")->constrained()->cascadeOnDelete();
            $table->string("payment_method");
            $table->string("address_note");
            $table->string("contact");
            $table->double("total_amount");
            $table->string("status")->default("pending");
            $table->string("payment_status")->default("not_paid");
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
