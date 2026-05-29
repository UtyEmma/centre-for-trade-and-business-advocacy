<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_type_id')->constrained()->restrictOnDelete();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->unsignedSmallInteger('publication_year')->nullable()->index();
            $table->date('published_at')->nullable()->index();
            $table->string('external_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['publication_type_id', 'is_published']);
            $table->index(['service_id', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
