<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_type_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('website_url')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['partner_type_id', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
