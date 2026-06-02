<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('media')) {
            DB::table('media')
                ->whereIn('model_type', [
                    'App\\Models\\GalleryCategory',
                    'App\\Models\\GalleryItem',
                ])
                ->delete();
        }

        Schema::disableForeignKeyConstraints();

        try {
            Schema::dropIfExists('gallery_items');
            Schema::dropIfExists('gallery_categories');
            Schema::dropIfExists('galleries');
        } finally {
            Schema::enableForeignKeyConstraints();
        }

        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('media')) {
            DB::table('media')
                ->where('model_type', 'App\\Models\\Gallery')
                ->delete();
        }

        Schema::dropIfExists('galleries');

        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('type', 20)->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('video_url', 2048)->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['gallery_category_id', 'is_published', 'sort_order']);
        });
    }
};
