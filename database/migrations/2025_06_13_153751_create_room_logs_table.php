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
        Schema::create('room_logs', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->string('accessed_by'); // You can use name or email
            $table->string('status'); // Example: 'Granted' or 'Denied'
            $table->timestamp('accessed_at')->useCurrent();
            $table->timestamps(); // Optional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_logs');
    }
};
