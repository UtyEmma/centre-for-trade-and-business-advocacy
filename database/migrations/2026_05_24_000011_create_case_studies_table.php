<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->restrictOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('partner')->nullable();
            $table->string('location')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->date('start_date')->nullable()->index();
            $table->date('end_date')->nullable()->index();
            $table->string('status')->default('draft')->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_published')->default(false)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['service_id', 'status']);
            $table->index(['is_published', 'is_featured']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
