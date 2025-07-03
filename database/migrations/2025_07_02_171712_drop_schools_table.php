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
        Schema::dropIfExists('schools');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('principal_name')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->year('established_year')->nullable();
            $table->json('social_media')->nullable(); // Facebook, Twitter, etc.
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
};
