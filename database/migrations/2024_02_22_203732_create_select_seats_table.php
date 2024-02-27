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
        Schema::create('select_seats', function (Blueprint $table) {
            $table->id();
            $table->integer('seat_number');
            $table->unsignedBigInteger('user_id'); // foreign key reference to users table
            $table->unsignedBigInteger('bus_id'); // foreign key reference to buses table
            $table->date('date');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('select_seats');
    }
};
