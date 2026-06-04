<main>

    <x-partials::page.header 
        title="Our Events"
        description="Discover our upcoming events, workshops, and webinars designed to empower your business with the latest insights and strategies in consulting, finance, and marketing."
        image="{{ asset('assets/images/banners/events-page-banner.png') }}"
    />

    <div class="tp-blog-area pt-100 max-md:pt-10! pb-100">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tp-blog-left-wrapper mr-130 mb-30">
                        @if ($this->events->isNotEmpty())
                            <div class="grid md:grid-cols-2 gap-5!">
                                @forelse ($this->events as $event)
                                    <article>
                                        <x-events.item :event="$event" />
                                    </article>
                                @empty
                                @endforelse
                            </div>
                        @else
                            <p class="text-center text-lg text-gray-600">There is nothing here yet. Please check back later.</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 order-first order-lg-last">
                    <div class="tp-sidebar-wrapper md:mb-30">
                        <div class="tp-sidebar-widget mb-45">
                            <div class="tp-sidebar-search">
                                <form action="#">
                                    <div class="tp-sidebar-search-input">
                                    <input type="text" placeholder="Search here">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M1 17L4.86666 13.1333M2.77727 8.1111C2.77727 12.0385 5.96102 15.2222 9.88837 15.2222C13.8157 15.2222 16.9995 12.0385 16.9995 8.1111C16.9995 4.18375 13.8157 1 9.88837 1C5.96102 1 2.77727 4.18375 2.77727 8.1111Z" stroke="#222F30" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>