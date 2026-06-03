<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('newsletter_campaign_recipients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('newsletter_campaign_id')->constrained(null, null, 'news_campaign_id_idx')->cascadeOnDelete();
            $table->foreignId('newsletter_subscriber_id')->nullable()->constrained(null, null, 'news_subscriber_id_idx')->nullOnDelete();
            $table->string('email');
            $table->string('name')->nullable();
            $table->string('status')->default('pending')->index();
            $table->text('failure_reason')->nullable();
            $table->timestamp('sent_at')->nullable()->index();
            $table->timestamp('failed_at')->nullable()->index();
            $table->timestamps();

            $table->unique(['newsletter_campaign_id', 'email'], 'campaign_email');
            $table->index(['newsletter_campaign_id', 'status'], 'campaign_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletter_campaign_recipients');
    }
};
