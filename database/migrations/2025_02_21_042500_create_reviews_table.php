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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade'); // foreign key referencing 'bookings' table
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // foreign key referencing 'customers' table
            $table->longText('review'); // review content (using LONGTEXT for large text)
            $table->integer('rating'); // rating (e.g., 1-5 scale)
            $table->boolean('status')->default(0); // status (default to true, meaning the review is active)
            $table->timestamps(); // created_at and updated_at columns
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
