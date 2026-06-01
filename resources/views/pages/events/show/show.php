<?php

use App\Models\Event;
use Livewire\Component;

new class extends Component
{
    public Event $event;

    public function mount(Event $event): void
    {
        abort_unless($event->isPubliclyVisible(), 404);

        $this->event = $event->loadMissing('service');
    }
};
