<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_type_id')->constrained()->restrictOnDelete();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->string('format')->default('in_person')->index();
            $table->string('venue')->nullable();
            $table->string('location')->nullable();
            $table->string('online_url')->nullable();
            $table->timestamp('start_at')->nullable()->index();
            $table->timestamp('end_at')->nullable()->index();
            $table->timestamp('registration_deadline')->nullable()->index();
            $table->string('external_registration_url')->nullable();
            $table->unsignedInteger('capacity')->nullable();
            $table->string('status')->default('draft')->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_published')->default(false)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['event_type_id', 'status']);
            $table->index(['service_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
