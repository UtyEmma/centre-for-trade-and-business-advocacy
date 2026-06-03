<main>
    <x-partials::page.header 
        :title="$post->title"
        :description="$post->excerpt"
        :image="$post->image"
        :breadcrumbs="[
            ['name' => 'News & Insights', 'url' => route('blog')],
            ['name' => $post->title]
        ]"  
    />

    <!-- blog area start -->
    <div class="tp-blog-area pt-100 pb-90">
        <div class="container col-md-10 mx-auto">
            <div class="row mb-20!">
                <div class="tp-blog-details-top">
                    {{-- <div class="tp-blog-details-heading text-center mb-70">
                        <h3 class="tp-section-title col-md-10 mx-auto" data-text-split data-letters-fade-in>{{$post->title}}</h3>
                    </div> --}}
                    <div class="tp-blog-details-thumb">
                        <img loading="lazy" class="radius-6 md:h-[70vh] object-cover w-full" src="{{ $post->image }}" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-2 order-xl-1 order-3">
                    <div class="tp-blog-details-social-box sticky top-20  mb-30">
                        <h3 class="tp-blog-details-social-title">SHARE:</h3>
                        <div class="tp-blog-details-social-item mb-5">
                            <a href="#" class="d-inline-flex align-items-center gap-2">
                                <div class="tp-blog-details-social-icon">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 14 14" fill="none">
                                            <path
                                                d="M7 0C5.61553 0 4.26216 0.410543 3.11101 1.17971C1.95987 1.94888 1.06266 3.04213 0.532846 4.32122C0.00303298 5.6003 -0.13559 7.00776 0.134506 8.36563C0.404603 9.7235 1.07129 10.9708 2.05026 11.9497C3.02922 12.9287 4.2765 13.5954 5.63437 13.8655C6.99224 14.1356 8.3997 13.997 9.67879 13.4672C10.9579 12.9373 12.0511 12.0401 12.8203 10.889C13.5895 9.73785 14 8.38447 14 7C13.998 5.14409 13.2599 3.36475 11.9476 2.05242C10.6353 0.740087 8.85592 0.00195988 7 0ZM7.53846 12.8982V8.61538H9.15385C9.29666 8.61538 9.43362 8.55865 9.5346 8.45767C9.63558 8.35669 9.69231 8.21973 9.69231 8.07692C9.69231 7.93411 9.63558 7.79715 9.5346 7.69617C9.43362 7.59519 9.29666 7.53846 9.15385 7.53846H7.53846V5.92308C7.53846 5.63746 7.65192 5.36354 7.85389 5.16158C8.05585 4.95961 8.32977 4.84615 8.61539 4.84615H9.69231C9.83512 4.84615 9.97208 4.78942 10.0731 4.68844C10.174 4.58746 10.2308 4.4505 10.2308 4.30769C10.2308 4.16488 10.174 4.02792 10.0731 3.92694C9.97208 3.82596 9.83512 3.76923 9.69231 3.76923H8.61539C8.04415 3.76923 7.49631 3.99615 7.09239 4.40008C6.68846 4.804 6.46154 5.35184 6.46154 5.92308V7.53846H4.84616C4.70335 7.53846 4.56639 7.59519 4.46541 7.69617C4.36443 7.79715 4.30769 7.93411 4.30769 8.07692C4.30769 8.21973 4.36443 8.35669 4.46541 8.45767C4.56639 8.55865 4.70335 8.61538 4.84616 8.61538H6.46154V12.8982C4.94361 12.7596 3.53754 12.0412 2.53578 10.8924C1.53402 9.74356 1.01371 8.25277 1.08306 6.73011C1.15242 5.20745 1.8061 3.77014 2.90815 2.71715C4.0102 1.66416 5.47576 1.07655 7 1.07655C8.52424 1.07655 9.98981 1.66416 11.0919 2.71715C12.1939 3.77014 12.8476 5.20745 12.9169 6.73011C12.9863 8.25277 12.466 9.74356 11.4642 10.8924C10.4625 12.0412 9.05639 12.7596 7.53846 12.8982Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="tp-blog-details-social-content">
                                    <span>Facebook</span>
                                </div>
                            </a>
                        </div>
                        <div class="tp-blog-details-social-item mb-5">
                            <a href="#" class="d-inline-flex align-items-center gap-2">
                                <div class="tp-blog-details-social-icon">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"
                                            viewBox="0 0 13 14" fill="none">
                                            <path
                                                d="M12.9079 13.0956L8.28565 5.92658L12.8466 0.975011C12.9498 0.860257 13.0029 0.710001 12.9946 0.556821C12.9862 0.403641 12.917 0.259883 12.802 0.156713C12.687 0.0535429 12.5354 -0.000722761 12.3801 0.00568086C12.2248 0.0120845 12.0783 0.0786412 11.9724 0.190921L7.62776 4.90712L4.63807 0.27035C4.58476 0.187536 4.51113 0.119341 4.42401 0.0720822C4.33689 0.0248235 4.23909 3.04091e-05 4.13967 6.89613e-08H0.595464C0.489552 -5.07643e-05 0.385575 0.0280023 0.294419 0.0812216C0.203263 0.134441 0.128283 0.210869 0.0773289 0.302502C0.026375 0.394136 0.00132211 0.497604 0.00479345 0.602073C0.0082648 0.706542 0.0401327 0.808168 0.0970603 0.89631L4.71929 8.06461L0.158346 13.0198C0.105084 13.0763 0.0637079 13.1426 0.0366152 13.215C0.00952247 13.2873 -0.00274814 13.3643 0.000514915 13.4414C0.00377797 13.5184 0.0225099 13.5941 0.0556244 13.664C0.088739 13.7339 0.135578 13.7966 0.193426 13.8485C0.251274 13.9003 0.318982 13.9404 0.392624 13.9662C0.466266 13.9921 0.544379 14.0033 0.622434 13.9992C0.700489 13.995 0.776934 13.9756 0.847339 13.9421C0.917744 13.9086 0.980708 13.8616 1.03258 13.8039L5.37719 9.08771L8.36687 13.7245C8.42062 13.8066 8.49444 13.8741 8.58153 13.9207C8.66863 13.9673 8.7662 13.9915 8.86528 13.9912H12.4095C12.5153 13.9912 12.6191 13.9631 12.7102 13.9099C12.8012 13.8567 12.8761 13.7804 12.927 13.6889C12.978 13.5973 13.0031 13.494 12.9997 13.3896C12.9963 13.2853 12.9646 13.1837 12.9079 13.0956ZM9.18942 12.8253L1.67128 1.16593H3.81257L11.3337 12.8253H9.18942Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="tp-blog-details-social-content">
                                    <span>Twitter</span>
                                </div>
                            </a>
                        </div>
                        <div class="tp-blog-details-social-item mb-5">
                            <a href="#" class="d-inline-flex align-items-center gap-2">
                                <div class="tp-blog-details-social-icon">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 14 14" fill="none">
                                            <path
                                                d="M7 3.76923C6.36101 3.76923 5.73638 3.95871 5.20508 4.31371C4.67378 4.66872 4.25969 5.17329 4.01516 5.76364C3.77063 6.35398 3.70665 7.00358 3.83131 7.63029C3.95597 8.257 4.26367 8.83267 4.7155 9.2845C5.16733 9.73633 5.743 10.044 6.36971 10.1687C6.99642 10.2934 7.64602 10.2294 8.23636 9.98484C8.82671 9.74031 9.33129 9.32622 9.68629 8.79492C10.0413 8.26362 10.2308 7.63899 10.2308 7C10.2299 6.14342 9.88921 5.32218 9.28352 4.71649C8.67782 4.11079 7.85658 3.77012 7 3.76923ZM7 9.15385C6.57401 9.15385 6.15759 9.02753 5.80339 8.79086C5.44919 8.55419 5.17313 8.2178 5.01011 7.82424C4.84709 7.43068 4.80443 6.99761 4.88754 6.57981C4.97065 6.162 5.17578 5.77822 5.477 5.477C5.77822 5.17578 6.162 4.97065 6.57981 4.88754C6.99761 4.80443 7.43068 4.84709 7.82424 5.01011C8.2178 5.17313 8.55419 5.44919 8.79086 5.80339C9.02753 6.15759 9.15385 6.57401 9.15385 7C9.15385 7.57124 8.92692 8.11907 8.523 8.523C8.11907 8.92692 7.57124 9.15385 7 9.15385ZM10.2308 0H3.76923C2.7699 0.001069 1.8118 0.398527 1.10516 1.10516C0.398527 1.8118 0.001069 2.7699 0 3.76923V10.2308C0.001069 11.2301 0.398527 12.1882 1.10516 12.8948C1.8118 13.6015 2.7699 13.9989 3.76923 14H10.2308C11.2301 13.9989 12.1882 13.6015 12.8948 12.8948C13.6015 12.1882 13.9989 11.2301 14 10.2308V3.76923C13.9989 2.7699 13.6015 1.8118 12.8948 1.10516C12.1882 0.398527 11.2301 0.001069 10.2308 0ZM12.9231 10.2308C12.9231 10.9448 12.6394 11.6296 12.1345 12.1345C11.6296 12.6394 10.9448 12.9231 10.2308 12.9231H3.76923C3.05519 12.9231 2.37039 12.6394 1.86548 12.1345C1.36058 11.6296 1.07692 10.9448 1.07692 10.2308V3.76923C1.07692 3.05519 1.36058 2.37039 1.86548 1.86548C2.37039 1.36058 3.05519 1.07692 3.76923 1.07692H10.2308C10.9448 1.07692 11.6296 1.36058 12.1345 1.86548C12.6394 2.37039 12.9231 3.05519 12.9231 3.76923V10.2308ZM11.3077 3.5C11.3077 3.65975 11.2603 3.81591 11.1716 3.94873C11.0828 4.08155 10.9567 4.18508 10.8091 4.24621C10.6615 4.30734 10.4991 4.32334 10.3424 4.29217C10.1858 4.26101 10.0418 4.18408 9.92888 4.07113C9.81592 3.95817 9.73899 3.81425 9.70783 3.65757C9.67666 3.5009 9.69266 3.3385 9.75379 3.19091C9.81492 3.04332 9.91845 2.91718 10.0513 2.82843C10.1841 2.73968 10.3403 2.69231 10.5 2.69231C10.7142 2.69231 10.9197 2.7774 11.0711 2.92888C11.2226 3.08035 11.3077 3.28579 11.3077 3.5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="tp-blog-details-social-content">
                                    <span>Instagram</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 order-xl-2 order-1">
                    <div class="mb-30">
                        {!! $post->content !!}
                    </div>
                </div>
                <div class="col-xl-3 order-xl-3 order-2">
                    <div class="tp-blog-details-wrap sticky top-20 mb-30">
                        <div class="tp-blog-details-info mb-25" data-bg-color="#F7F7F5">
                            <h3 class="tp-blog-details-social-title fw-medium">DETAILS:</h3>
                            <div class="tp-blog-details-info-list">
                                <ul>
                                    <li>
                                        <span class="fw-medium">Date</span>
                                        <span>{{ $post->date }}</span>
                                    </li>
                                    @if ($post->category)
                                        <li>
                                            <span class="fw-medium">Category</span>
                                            <span>{{ $post->category->name }}</span>
                                        </li>
                                    @endif
                                    {{-- <li>
                                        <span class="fw-medium">READING TIME</span>
                                        <span>17 Min</span>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="tp-blog-details-info" data-bg-color="#F7F7F5">
                            <div class="tp-blog-details-info-author">
                                <h3 class="tp-blog-details-social-title fw-medium">AUTHORS:</h3>
                                <div class="tp-at-testimonial-user d-flex align-items-center gap-3 mb-25">
                                    {{-- <div class="tp-at-testimonial-user-img">
                                        <img loading="lazy" src="assets/img/accounting/testimonial/user-3.jpg" alt="">
                                    </div> --}}
                                    <div class="tp-at-testimonial-user-info">
                                        <h3 class="tp-at-testimonial-user-name">{{ $post->author->name }}</h3>
                                        <span>{{ $post->author->role }}</span>
                                    </div>
                                </div>
                                <p class="mb-0">{{$post->author->bio}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->

    <livewire:posts.comments :post="$post" />

    <!-- blog area start -->
    <div class="tp-blog-area pt-130 pb-110" data-bg-color="#E7E8E1">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-blog-details-heading text-center mb-50">
                        <span class="tp-section-sub tp-fade-anim">Latest insights</span>
                        <h3 class="tp-section-title" data-text-split data-letters-fade-in>Fresh insights and updates.
                            Your <br> guide to a better work life</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($this->relatedPosts as $relatedPost)
                    <div class="col-md-4">
                        <x-posts.item :post="$relatedPost" />
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <!-- blog area end -->
</main>
