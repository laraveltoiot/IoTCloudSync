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
        Schema::create('cloud_variables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // 'integer', 'float', 'string', 'boolean' etc.
            $table->text('value')->nullable();
            $table->foreignId('thing_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloud_variables');
    }
};
