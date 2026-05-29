<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('role')->nullable();
            $table->longText('notes')->nullable();
            $table->string('status')->default('pending')->index();
            $table->timestamp('registered_at')->nullable()->index();
            $table->timestamp('responded_at')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['event_id', 'status']);
            $table->index(['email', 'event_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
