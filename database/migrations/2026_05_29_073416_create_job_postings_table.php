<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department')->nullable()->index();
            $table->string('location')->nullable()->index();
            $table->string('employment_type')->default('full_time')->index();
            $table->string('workplace_type')->default('onsite')->index();
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->longText('responsibilities')->nullable();
            $table->longText('requirements')->nullable();
            $table->longText('benefits')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('application_url')->nullable();
            $table->string('application_email')->nullable();
            $table->timestamp('application_deadline')->nullable()->index();
            $table->string('status')->default('draft')->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_published')->default(false)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
