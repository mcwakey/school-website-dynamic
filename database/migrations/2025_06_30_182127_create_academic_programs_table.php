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
        Schema::create('academic_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('details')->nullable(); // Rich text for detailed information
            $table->string('age_group')->nullable(); // e.g., "5-7 years"
            $table->string('duration')->nullable(); // e.g., "3 years"
            $table->string('image_path')->nullable();
            $table->string('icon')->nullable(); // Font Awesome icon class
            $table->decimal('fees', 10, 2)->nullable(); // Program fees
            $table->json('subjects')->nullable(); // Array of subjects
            $table->json('features')->nullable(); // Array of program features
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_programs');
    }
};
