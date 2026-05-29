<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->morphs('commentable');
            $table->foreignId('comment_id')->nullable()->constrained('comments')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('website_url')->nullable();
            $table->longText('comment');
            $table->string('status')->default('pending')->index();
            $table->timestamp('approved_at')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['comment_id', 'status']);
            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
