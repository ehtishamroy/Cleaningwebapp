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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->date('booking_date'); 
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); 
            $table->foreignId('duration_id')->constrained('durations')->onDelete('cascade');
            $table->boolean('review_given')->default(0); 
            $table->text('address');
            $table->decimal('payment', 8, 2); 
            $table->boolean('is_follow_up')->default(0); 
            $table->boolean('is_cancelled')->default(0); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
