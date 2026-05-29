<div class="tp-cn-blog-item mb-30 p-5!">
    @if ($post->image)
        <div class="tp-cc-blog-item-thumb radius-6 mb-5!">
            <a href="{{ route('blog.show', $post) }}">
                <img class="radius-6 h-96! object-cover" src="{{ $post->image }}" alt="{{ $post->title }}">
            </a>
        </div>
    @endif

    <div class="flex justify-between items-center">
        <div class="tp-cn-blog-item-meta">   
            @if ($post->category)                            
                <span class="category">{{ $post->category->name }}</span>
            @endif 
    
            @if ($post->author)
            <div class="user-info">
                {{-- <img src="assets/img/consulting/blog/user-1.jpg" alt="Ankush"> --}}
                <span>By <span class="font-medium!" >{{ $post->author->name }}</span></span>
            </div>
            @endif
        </div>

        <div class="tp-cn-blog-item-meta">
            <span class="date">{{ $post->date }}</span>
        </div>
    </div>

    <h3 class="tp-cn-blog-item-title">
        <a class="tp-line-anim text-xl!" href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
    </h3>

    <p class="description line-clamp-3">{{$post->excerpt}}</p>
    {{-- <div class="tp-cn-blog-item-user"> --}}
        
        {{-- <div class="stats">
            <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
            <path d="M12.7218 6.41668C12.7241 7.29659 12.519 8.1646 12.1232 8.95001C11.6539 9.89117 10.9325 10.6828 10.0397 11.2362C9.14697 11.7896 8.11813 12.0829 7.06844 12.0833C6.1906 12.0856 5.32463 11.88 4.54106 11.4833L0.75 12.75L2.01369 8.95001C1.61791 8.1646 1.41281 7.29659 1.4151 6.41668C1.41551 5.36452 1.70815 4.33325 2.26025 3.43838C2.81236 2.54352 3.60211 1.8204 4.54106 1.35002C5.32463 0.953306 6.1906 0.747725 7.06844 0.750019H7.40099C8.78729 0.82668 10.0967 1.41319 11.0784 2.39726C12.0602 3.38132 12.6453 4.69378 12.7218 6.08334V6.41668Z" stroke="#586C6E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>   
            35
            </span>
            <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="none">
            <path d="M10.4178 6.75397C10.4178 8.18962 9.26042 9.34974 7.82814 9.34974C6.39586 9.34974 5.23847 8.18962 5.23847 6.75397C5.23847 5.31832 6.39586 4.1582 7.82814 4.1582C9.26042 4.1582 10.4178 5.31832 10.4178 6.75397Z" stroke="#586C6E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M7.82819 12.75C10.3817 12.75 12.7616 11.2418 14.4181 8.63157C15.0691 7.60921 15.0691 5.89078 14.4181 4.86843C12.7616 2.25816 10.3817 0.75 7.82819 0.75C5.27469 0.75 2.8948 2.25816 1.23828 4.86843C0.587241 5.89078 0.587241 7.60921 1.23828 8.63157C2.8948 11.2418 5.27469 12.75 7.82819 12.75Z" stroke="#586C6E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            234.5k
            </span>
        </div> --}}
    {{-- </div> --}}
    <div class="tp-cn-blog-item-btn">
        <a class="tp-btn tp-btn-switch-animation" href="{{ route('blog.show', $post) }}">
            <span class="d-flex align-items-center justify-content-center">
            <span class="btn-text">
                Read more
            </span>
            <i class="btn-icon"></i>
            <i class="btn-icon"></i>
            </span>
        </a>
    </div>
</div>