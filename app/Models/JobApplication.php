<?php

namespace App\Models;

use App\Enums\JobApplicationStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'job_posting_id',
    'first_name',
    'last_name',
    'email',
    'phone',
    'linkedin_url',
    'resume_path',
    'resume_original_name',
    'cover_letter_path',
    'cover_letter_original_name',
    'status',
    'admin_notes',
    'submitted_at',
    'reviewed_at',
])]
class JobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JobApplicationFactory> */
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'status' => JobApplicationStatus::class,
            'submitted_at' => 'datetime',
            'reviewed_at' => 'datetime',
        ];
    }

    public function jobPosting(): BelongsTo
    {
        return $this->belongsTo(JobPosting::class);
    }

    public function getApplicantNameAttribute(): string
    {
        return trim($this->first_name.' '.$this->last_name);
    }
}
