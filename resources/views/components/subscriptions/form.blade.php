<?php

use App\Actions\Newsletters\SubscribeToNewsletter;
use App\Support\Newsletter;
use Livewire\Component;
use Illuminate\Validation\Rule;

new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $responseMessage = '';

    public bool $responseIsError = false;

    public function submit(): void
    {
        $this->responseMessage = '';
        $this->responseIsError = false;

        $validated = $this->validate();

        try {
            $result = app(SubscribeToNewsletter::class)->handle(
                email: $validated['email'],
                name: filled($validated['name']) ? $validated['name'] : null,
                source: 'footer',
                request: request(),
            );

            $settings = Newsletter::settings();

            $this->responseMessage = match ($result['result']) {
                'already_active' => $settings->already_subscribed_message,
                'confirmation_sent' => $settings->confirmation_sent_message,
                default => $settings->signup_success_message,
            };

            if ($result['result'] !== 'already_active') {
                $this->reset('name', 'email');
                $this->resetValidation();
            }
        } catch (\Exception $exception) {
            report($exception);

            $this->responseIsError = true;
            $this->responseMessage = 'We could not process your subscription right now. Please try again.';
        }
    }

    /**
     * @return array<string, list<string>>
     */
    protected function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', Rule::email()
            ->rfcCompliant(strict: false)
            ->validateMxRecord()
            ->preventSpoofing()],
        ];
    }
};
?>

<div class="flex max-md:flex-col! md:items-center! gap-5!" >
    <div class="col-lg-6">
        <div class="tp-footer-2-newsletter max-md:flex-col! max-md:items-start! md:mb-0!">
            <div class="tp-footer-2-newsletter-icon">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24" fill="none">
                    <path d="M10.5473 24C11.9859 24 13.2248 23.131 13.7685 21.8906H7.32605C7.86966 23.131 9.10861 24 10.5473 24Z" fill="#01373D"/>
                    <path d="M17.8126 11.6185V10.0781C17.8126 6.80522 15.637 4.0312 12.6563 3.12516V2.10938C12.6563 0.946266 11.71 0 10.5469 0C9.38382 0 8.43755 0.946266 8.43755 2.10938V3.12516C5.45677 4.0312 3.2813 6.80517 3.2813 10.0781V11.6185C3.2813 14.4935 2.18546 17.2195 0.195664 19.2946C0.00066416 19.4979 -0.0541328 19.798 0.0563985 20.0571C0.16693 20.3162 0.421461 20.4844 0.70318 20.4844H20.3907C20.6724 20.4844 20.9269 20.3162 21.0374 20.0571C21.1479 19.798 21.0931 19.4979 20.8982 19.2946C18.9084 17.2195 17.8126 14.4934 17.8126 11.6185ZM11.2501 2.84663C11.0186 2.82431 10.7841 2.8125 10.5469 2.8125C10.3097 2.8125 10.0752 2.82431 9.8438 2.84663V2.10938C9.8438 1.72167 10.1592 1.40625 10.5469 1.40625C10.9346 1.40625 11.2501 1.72167 11.2501 2.10938V2.84663Z" fill="#01373D"/>
                    </svg>
                </span>
            </div>
            <div class="tp-footer-2-newsletter-content">
                <span>Stay informed on policy, markets, and reform.</span>
                <p>Subscribe to receive updates on our research, publications, events, position papers, and policy developments across trade, competition, and regulatory governance.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <form class="flex flex-col w-full! md:items-end!" wire:submit="submit" >
            <div class="tp-footer-2-newsletter-input mb-2">
                <input type="text" placeholder="Your name (optional)" wire:model="name">
            </div>
            <x-input.error key="name" class="mt-1 text-white!" />

            <div class="tp-footer-2-newsletter-input">
                <input type="email" placeholder="Your email address" required wire:model="email">
                <button type="submit" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="submit">
                        <x-phosphor-arrow-right class="size-6 text-white!"  />
                    </span>
                    <span wire:loading wire:target="submit">
                        <x-phosphor-spinner class="animate-spin size-6 text-white!"  />
                    </span>
                </button>
            </div>
            <x-input.error key="email" class="mt-1 text-white!" />

            @if (filled($responseMessage))
                <p class="ajax-response {{ $responseIsError || $errors->any() ? 'text-white!' : 'text-green-500!' }} mt-2 mb-0">
                    {{ $errors->first() ?: $responseMessage }}
                </p>
            @endif
        </form>
    </div>
</div>
