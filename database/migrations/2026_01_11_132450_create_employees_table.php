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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->foreignId('division_id')->constrained()->onDelete('cascade');
            $table->string('job_level'); // BOD-1, BOD-2, BOD-3, BOD-4
            $table->enum('talent_category', ['High Potential', 'Promotable', 'Non Talent', 'Regular']);
            $table->string('position');
            $table->integer('performance_score')->nullable();
            $table->integer('potential_score')->nullable();
            $table->boolean('is_promotable')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
