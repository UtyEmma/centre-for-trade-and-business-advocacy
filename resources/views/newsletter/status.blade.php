<x-layouts::app>
    <main>
        {{-- <x-partials::page.header
            :title="$title"
            :description="$message"
        /> --}}

        <section class="tp-contact-ptb pt-100 pb-100">
            <div class="container col-md-8 mx-auto text-center">
                <x-phosphor-mailbox-duotone class="mb-30 size-20 md:size-40 text-primary!" size="64" />
                <h3 class="tp-section-title mb-20">{{ $title }}</h3>
                <p>{{ $message }}</p>
                <a class="tp-btn tp-btn-switch-animation mt-20" href="{{ route('home') }}">
                    <span class="d-flex align-items-center justify-content-center">
                        <span class="btn-text">Return home</span>
                        <i class="btn-icon"></i>
                        <i class="btn-icon"></i>
                    </span>
                </a>
            </div>
        </section>
    </main>
</x-layouts::app>
