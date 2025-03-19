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
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('apt_no');
        });

        // Adding the apt_no column to the customers table
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('apt_no')->nullable(); // Add apt_no column (nullable)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('apt_no'); // Drop apt_no from customers
        });
    }
};
