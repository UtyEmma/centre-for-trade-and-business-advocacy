<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_category_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('role')->nullable();
            $table->longText('bio')->nullable();
            $table->string('email')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['team_category_id', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
