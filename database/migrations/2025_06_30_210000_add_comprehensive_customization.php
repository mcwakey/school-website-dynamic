<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Settings table already has the necessary columns (key, value, type, group, description)
        // Add category column if it doesn't exist (mapping from group)
        if (!Schema::hasColumn('settings', 'category')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->string('category')->nullable()->after('key');
            });
        }

        // Create page_contents table for customizable page sections
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page'); // home, about, contact, etc.
            $table->string('section'); // hero, welcome, mission, etc.
            $table->string('key'); // unique identifier
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->json('metadata')->nullable(); // additional data like links, colors, etc.
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Create theme_settings table for design customization
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // colors, fonts, layout, etc.
            $table->string('key');
            $table->text('value');
            $table->string('type')->default('text'); // color, font, image, etc.
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create custom_menus table for menu management
        Schema::create('custom_menus', function (Blueprint $table) {
            $table->id();
            $table->string('location'); // header, footer, sidebar
            $table->string('name');
            $table->string('label');
            $table->string('url');
            $table->string('target')->default('_self');
            $table->string('icon')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (Schema::hasColumn('settings', 'category')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }

        Schema::dropIfExists('page_contents');
        Schema::dropIfExists('theme_settings');
        Schema::dropIfExists('custom_menus');
    }
};
