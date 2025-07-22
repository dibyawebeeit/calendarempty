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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('stateId')->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->double('attorney_rate')->default(0.00);
            $table->double('legal_secretary_rate')->default(0.00);
            $table->double('legal_assistant_rate')->default(0.00);
            $table->double('initial_balance')->default(0.00);
            $table->text('notes')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
