<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('subject');
            $table->longText('message');
            $table->string('status')->default('new')->index();
            $table->longText('admin_notes')->nullable();
            $table->timestamp('responded_at')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['email', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
