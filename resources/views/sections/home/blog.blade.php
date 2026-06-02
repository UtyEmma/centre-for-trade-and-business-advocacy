@props([
    'posts' => collect(),
    'title' => 'Latest Insights',
    'headline' => 'Discover the latest insights, trends, and expert advice'
])

@if ($posts->isNotEmpty())
    <div class="tp-cc-blog-ptb tp-sec-ptb pt-130 pb-110" data-bg-color="#F8F8F8">
        <div class="container col-md-10 mx-auto">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <div class="tp-cc-blog-heading mb-60">
                        <span class="tp-section-cn-sub tp-fade-anim">{{ $title }}</span>
                        <h3 class="tp-section-title corporate-color" data-text-split data-letters-fade-in>{{$headline}}</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="tp-cc-blog-btn text-lg-end mb-60 tp-fade-anim" data-delay=".5">
                        <x-button as="a" href="{{ route('blog') }}" >More Insights</x-button>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($posts as $post)
                    <div class="col-xl-4 col-md-6">
                        <x-posts.item :post="$post" />
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
@endif