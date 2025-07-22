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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();// Foreign key to clients table
            $table->foreignId('client_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Month of billing, always store first day of month (e.g., 2025-07-01)
            $table->date('billing_month');

            // Financial fields
            $table->decimal('initial_balance', 10, 2)->default(0);
            $table->decimal('fees', 10, 2)->default(0);
            $table->decimal('costs', 10, 2)->default(0);
            $table->decimal('payment', 10, 2)->default(0);
            $table->decimal('refund', 10, 2)->default(0);
            $table->decimal('trust_credit', 10, 2)->default(0);
            $table->decimal('trust_debit', 10, 2)->default(0);
            $table->decimal('balance_due', 10, 2)->default(0);

            // Optional fields
            $table->boolean('is_finalized')->default(false); // prevent further edits if true

            $table->timestamps();

            // Prevent duplicate billing for the same client/month
            $table->unique(['client_id', 'billing_month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
