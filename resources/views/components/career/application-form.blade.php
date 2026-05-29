<?php

use App\Enums\JobApplicationStatus;
use App\Enums\JobPostingStatus;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public JobPosting $jobPosting;

    public string $firstName = '';

    public string $lastName = '';

    public string $email = '';

    public string $phone = '';

    public string $linkedinUrl = '';

    public ?TemporaryUploadedFile $resume = null;

    public ?TemporaryUploadedFile $coverLetter = null;

    public string $responseMessage = '';

    public bool $responseIsError = false;

    public function submit(): void
    {
        $this->responseMessage = '';
        $this->responseIsError = false;

        if (! $this->acceptsInAppApplications()) {
            $this->responseIsError = true;

            throw ValidationException::withMessages([
                'resume' => 'Applications are not currently available through this form.',
            ]);
        }

        $validated = $this->validate();

        $resumePath = $this->storeUploadedFile($this->resume, 'resume');
        $coverLetterPath = $this->coverLetter instanceof TemporaryUploadedFile
            ? $this->storeUploadedFile($this->coverLetter, 'cover-letter')
            : null;

        try {
            $this->jobPosting->applications()->create([
                'first_name' => $validated['firstName'],
                'last_name' => $validated['lastName'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'linkedin_url' => filled($validated['linkedinUrl']) ? $validated['linkedinUrl'] : null,
                'resume_path' => $resumePath,
                'resume_original_name' => $this->resume?->getClientOriginalName(),
                'cover_letter_path' => $coverLetterPath,
                'cover_letter_original_name' => $this->coverLetter?->getClientOriginalName(),
                'status' => JobApplicationStatus::New,
                'submitted_at' => now(),
            ]);
        } catch (\Throwable $exception) {
            Storage::disk('local')->delete(array_filter([$resumePath, $coverLetterPath]));
            report($exception);

            $this->responseIsError = true;

            throw ValidationException::withMessages([
                'resume' => 'We could not submit your application right now. Please try again.',
            ]);
        }

        $this->reset('firstName', 'lastName', 'email', 'phone', 'linkedinUrl', 'resume', 'coverLetter');
        $this->resetValidation();

        $this->responseMessage = 'Thank you. Your application has been submitted.';
    }

    public function acceptsInAppApplications(): bool
    {
        return blank($this->jobPosting->application_url)
            && blank($this->jobPosting->application_email)
            && $this->jobPosting->is_published
            && $this->jobPosting->status === JobPostingStatus::Open;
    }

    /**
     * @return array<string, list<string>>
     */
    protected function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'linkedinUrl' => ['nullable', 'url', 'max:255'],
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            'coverLetter' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
        ];
    }

    private function storeUploadedFile(TemporaryUploadedFile $file, string $type): string
    {
        return $file->storeAs(
            'job-applications/'.$this->jobPosting->getKey(),
            Str::uuid().'-'.$type.'.'.$file->getClientOriginalExtension(),
            'local',
        );
    }
};
?>

<div class="tp-career-details-input-box radius-6" data-bg-color="#F7F7F5">
    <div class="tp-career-details-input-top">
        <h3 class="tp-section-title text-4xl mb-15">Apply for this role</h3>
        <p>Apply for this career opportunity by submitting your details below.</p>
    </div>
    <div class="tp-career-details-input-content">
        @if ($this->acceptsInAppApplications())
            <form wire:submit="submit" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <label class="tp-career-details-input-label">Your full name*</label>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-career-details-input mb-40">
                            <input type="text" placeholder="Your Name" wire:model="firstName">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-career-details-input mb-40">
                            <input type="text" placeholder="Last Name" wire:model="lastName">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-career-details-input mb-40">
                            <label class="tp-career-details-input-label">Email address*</label>
                            <input type="email" placeholder="lusimanager@gmail.com" wire:model="email">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-career-details-input mb-40">
                            <label class="tp-career-details-input-label">Phone number*</label>
                            <input type="text" placeholder="000+ 000 0000 0000" wire:model="phone">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="tp-career-details-input mb-40">
                            <label class="tp-career-details-input-label">LinkedIn profile or professional website (optional)</label>
                            <input type="text" placeholder="" wire:model="linkedinUrl">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="tp-career-details-input mb-40">
                            <label class="tp-career-details-input-label">Upload your resume or
                                CV*</label>
                            <div>
                                <input type="file" class="border-0! rounded-none!" placeholder="" wire:model="resume">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="tp-career-details-input mb-40">
                            <label class="tp-career-details-input-label">Upload your Cover letter (Optional)</label>
                            <div>
                                <input type="file" class="border-0! rounded-none!" placeholder="" wire:model="coverLetter">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="tp-career-details-input">
                            <button class="tp-btn theme-bg-color tp-btn-switch-animation" type="submit" wire:loading.attr="disabled">
                                <span class="d-flex align-items-center justify-content-center">
                                    <span class="btn-text">
                                        Submit your application
                                    </span>
                                    <i class="btn-icon"></i>
                                    <i class="btn-icon"></i>
                                </span>
                            </button>
                            <p class="ajax-response {{ $errors->any() || $responseIsError ? 'text-danger' : 'text-success' }} mt-2 mb-0">
                                {{ $errors->first() ?: $responseMessage }}
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <p class="ajax-response text-danger mb-0">Applications are not currently open for this role.</p>
        @endif
    </div>
</div>
