<main>
   <x-partials::page.header 
      title="News & Insights"
      description="Discover the latest insights, trends, and expert advice in our blog. Stay informed and inspired with our in-depth articles on technology, business, and innovation."
      image="{{ asset('assets/images/banners/blog-page-banner.png') }}"
   />

      <div class="grid md:grid-cols-3 gap-5 col-md-10 pt-135 pb-110 mx-auto">
         <div class="col-span-2 tp-blog-ptb tp-sec-ptb">
            @forelse ($this->posts as $post)
            <div class="col-md-12">
                  <x-posts.list :post="$post" />
               </div>
            @empty
               <div class="col-12">
                  <p class="text-center">No posts found.</p>
               </div>
            @endforelse
            
            <div class="col-12">
               <div class="tp-blog-btn text-center mt-35">
                  <button class="tp-btn theme-bg-color">
                     <span class="d-flex align-items-center justify-content-center">
                        <span class="btn-text">
                           See open position
                        </span>
                        <i class="ml-10">
                           <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                           <path d="M6.75 0.75V2.75M6.75 10.75V12.75M12.75 6.75H10.75M2.75 6.75H0.75M10.9923 2.50781L9.57813 3.92203M3.92203 9.57813L2.50781 10.9923M10.9923 10.9923L9.57813 9.57813M3.92203 3.92203L2.50781 2.50781" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                           </svg>
                        </i>
                     </span>
                  </button>
               </div>
            </div>
         </div>

         <div class="col-span-1">
            <x-partials::blog.sidebar
               :categories="$this->categories"
               :tags="$this->tags"
               :recent-posts="$this->recentPosts"
            />
         </div>
      </div>  
</main>