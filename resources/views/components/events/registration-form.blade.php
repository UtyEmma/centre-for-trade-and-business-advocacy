<?php

use App\Enums\EventRegistrationStatus;
use App\Models\Event;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

new class extends Component
{
    public Event $event;

    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $organization = '';

    public string $role = '';

    public string $notes = '';

    public string $responseMessage = '';

    public bool $responseIsError = false;

    public function submit(): void
    {
        $this->responseMessage = '';
        $this->responseIsError = false;

        if (! $this->event->acceptsRegistrations()) {
            $this->responseIsError = true;

            throw ValidationException::withMessages([
                'name' => 'Registrations are not currently open for this event.',
            ]);
        }

        if (filled($this->event->external_registration_url)) {
            $this->responseIsError = true;

            throw ValidationException::withMessages([
                'name' => 'Please use the event registration link to register.',
            ]);
        }

        $validated = $this->validate();

        $this->event->registrations()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'organization' => filled($validated['organization']) ? $validated['organization'] : null,
            'role' => filled($validated['role']) ? $validated['role'] : null,
            'notes' => filled($validated['notes']) ? $validated['notes'] : null,
            'status' => EventRegistrationStatus::Pending,
            'registered_at' => now(),
        ]);

        $this->reset('name', 'email', 'phone', 'organization', 'role', 'notes');
        $this->resetValidation();

        $this->responseMessage = 'Thank you. Your registration has been submitted.';
    }

    /**
     * @return array<string, list<string>>
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:5000'],
        ];
    }
};
?>

<div class="tp-contact-from mb-30 tp-fade-anim" data-delay=".5" data-fade-from="right">
    @if ($event->acceptsRegistrations() && blank($event->external_registration_url))
        <form wire:submit="submit">
            <div class="row">
                <div class="col-12">
                    <div class="tp-contact-input mb-15">
                        <input placeholder="Your full name*" wire:model="name" type="text">
                        <x-input.error key="name" class="mt-2" />
                    </div>
                    <div class="tp-contact-input mb-15">
                        <input placeholder="Email address*" wire:model="email" type="email">
                        <x-input.error key="email" class="mt-2" />
                    </div>
                    <div class="tp-contact-input mb-15">
                        <input placeholder="Phone Number*" wire:model="phone" type="tel">
                        <x-input.error key="phone" class="mt-2" />
                    </div>
                    <div class="tp-contact-input mb-15">
                        <input placeholder="Organization" wire:model="organization" type="text">
                        <x-input.error key="organization" class="mt-2" />
                    </div>
                    <div class="tp-contact-input mb-15">
                        <input placeholder="Role / title" wire:model="role" type="text">
                        <x-input.error key="role" class="mt-2" />
                    </div>
                    <div class="tp-contact-input mb-15">
                        <textarea placeholder="Additional notes" wire:model="notes"></textarea>
                        <x-input.error key="notes" class="mt-2" />
                    </div>
                    <div class="tp-contact-input-btn">
                        <button class="tp-btn w-100" type="submit" wire:loading.attr="disabled">
                            Register for this event
                        </button>
                        <p class="ajax-response {{ $errors->any() || $responseIsError ? 'text-danger' : 'text-success' }} mt-5">
                            {{ $errors->first() ?: $responseMessage }}
                        </p>
                    </div>
                </div>
            </div>
        </form>
    @else
        <p class="ajax-response text-danger mb-0">Registrations are not currently open for this event.</p>
    @endif
</div>
