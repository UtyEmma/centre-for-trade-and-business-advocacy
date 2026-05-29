<?php

use App\Enums\JobApplicationStatus;
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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_posting_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->index();
            $table->string('phone');
            $table->string('linkedin_url')->nullable();
            $table->string('resume_path');
            $table->string('resume_original_name')->nullable();
            $table->string('cover_letter_path')->nullable();
            $table->string('cover_letter_original_name')->nullable();
            $table->string('status')->default(JobApplicationStatus::New->value)->index();
            $table->text('admin_notes')->nullable();
            $table->timestamp('submitted_at')->nullable()->index();
            $table->timestamp('reviewed_at')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['job_posting_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
