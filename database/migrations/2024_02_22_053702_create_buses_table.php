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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('bus_number');
            $table->string('root_number');
            $table->string('type');
            $table->string('start');
            $table->time('starttime');
            $table->string('end');
            $table->time('endtime');
            $table->text('description');
            $table->string('image');
            $table->decimal('price', 10, 2);
            $table->string('status')->default('stop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
