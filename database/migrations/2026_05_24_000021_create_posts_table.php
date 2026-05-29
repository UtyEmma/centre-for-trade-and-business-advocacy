<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_category_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('status')->default('draft')->index();
            $table->timestamp('published_at')->nullable()->index();
            $table->boolean('allow_comments')->default(true)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['post_category_id', 'status']);
            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
