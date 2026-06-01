
<main>
    <x-partials::page.header 
        :title="$event->title"
        :description="$event->summary"
        :image="$event->image"
        :breadcrumbs="[
            ['name' => 'Events', 'url' => route('events')],
            ['name' => $event->title ],
        ]"
        overlay
    />

    <div class="md:my-20! md:flex col-md-10 mx-auto gap-10!">
        <div class="md:w-[40%]">
            <img class="w-full rounded top-36 sticky" src="{{ $event->image }}" alt="">
        </div>

        <div class="flex-1">
            <h2 class="text-2xl font-semibold mb-7!">{{ $event->title }}</h2>
            
            <div class="flex flex-col gap-1 mb-7!">
                <div class="flex items-center gap-2">
                    <x-phosphor-check-circle-duotone class="size-7!" />
                    <span>Status: {{ $event->status->getLabel() }} &bull; {{ $event->event_status }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <x-phosphor-calendar-check-duotone class="size-7!" />
                    <span>{{ $event->day }} &bull; {{ $event->time }}</span>        
                </div>
                <div class="flex items-center gap-2">
                    <x-phosphor-clock-clockwise-duotone class="size-7!" />
                    <span>{{ $event->time }}</span>        
                </div>
                <div class="flex items-center gap-2">
                    <x-phosphor-map-pin-area-duotone class="size-7!" />
                    <span>{{ $event->event_location }} ({{ str($event->format)->replace('_', ' ')->headline() }})</span>
                </div>

                {{-- @if ($event->service)
                    <div class="flex items-center gap-2">
                        <x-phosphor-briefcase-duotone class="size-7!" />
                        <span>Service: {{ $event->service->title }}</span>
                    </div>
                @endif --}}

                {{-- @if (filled($event->online_url))
                    <div class="flex items-center gap-2">
                        <x-phosphor-link-duotone class="size-7!" />
                        <a class="tp-line-anim" href="{{ $event->online_url }}" target="_blank" rel="noopener">Open event link</a>
                    </div>
                @endif --}}
            </div>

            <div class="mb-7!">
                <h4 class="mb-5!">About this Event</h4>

                <div class="text-gray-600">
                    {!! $event->description !!}
                </div>
            </div>

            <div>
                <h4 class="mb-5!">Register for this event</h4>

                @if ($event->acceptsRegistrations() && filled($event->external_registration_url))
                    <a class="tp-btn theme-bg-color" href="{{ $event->external_registration_url }}" target="_blank" rel="noopener">
                        Register Now
                    </a>
                @elseif ($event->acceptsRegistrations())
                    <livewire:events.registration-form :event="$event" />
                @else
                    <div class="tp-contact-from mb-30 p-2 rounded border" data-bg-color="#F7F7F5">
                        <p class="ajax-response text-danger mb-2">Registrations are not currently open for this event.</p>
                        {{-- <p class="mb-0">Status: {{ $event->status->getLabel() }} &bull; {{ $event->event_status }}</p> --}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
