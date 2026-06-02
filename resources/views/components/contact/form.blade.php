<?php

use App\Enums\ContactMessageStatus;
use App\Models\ContactMessage;
use Livewire\Component;

new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $message = '';

    public string $responseMessage = '';

    public bool $responseIsError = false;

    public function submit(): void
    {
        $this->responseMessage = '';
        $this->responseIsError = false;

        $validated = $this->validate();

        try {
            ContactMessage::query()->create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'subject' => 'Website contact form submission',
                'message' => $validated['message'],
                'status' => ContactMessageStatus::New,
            ]);

            $this->reset('name', 'email', 'phone', 'message');
            $this->resetValidation();

            $this->responseMessage = 'Thank you. Your message has been submitted.';
        } catch (\Throwable $exception) {
            report($exception);

            $this->responseIsError = true;
            $this->responseMessage = 'We could not submit your message right now. Please try again.';
        }
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
            'message' => ['required', 'string', 'max:5000'],
        ];
    }
};
?>

<div class="tp-contact-from mb-30 tp-fade-anim" data-delay=".5" data-fade-from="right">
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
                    <textarea placeholder="How can we help? Feel free to write here" wire:model="message"></textarea>
                    <x-input.error key="message" class="mt-2" />
                </div>
                <div class="tp-contact-input-btn">
                    <button class="tp-btn w-100" type="submit" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="submit">Send your message</span>
                        <span wire:loading wire:target="submit">Sending...</span>
                    </button>

                    @if (filled($responseMessage) || $errors->any())
                        <p class="ajax-response {{ $errors->any() || $responseIsError ? 'text-danger' : 'text-success' }} mt-5">
                            {{ $errors->first() ?: $responseMessage }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
