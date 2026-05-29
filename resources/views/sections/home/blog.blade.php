<div class="tp-cc-blog-ptb tp-sec-ptb pt-130 pb-110" data-bg-color="#F8F8F8">
    <div class="container col-md-10 mx-auto">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <div class="tp-cc-blog-heading mb-60">
                    <span class="tp-section-cn-sub tp-fade-anim">Latest insights</span>
                    <h3 class="tp-section-title corporate-color" data-text-split data-letters-fade-in>Fresh insights and
                        updates. Your <br> guide to a better work life</h3>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="tp-cc-blog-btn text-lg-end mb-60 tp-fade-anim" data-delay=".5">
                    <a class="tp-btn tp-btn-advisory-style tp-btn-border tp-btn-switch-animation" href="blog.html">
                        <span class="d-flex align-items-center justify-content-center">
                            <span class="btn-text">
                                More insights
                            </span>
                            <i class="btn-icon"></i>
                            <i class="btn-icon"></i>
                        </span>
                    </a>
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