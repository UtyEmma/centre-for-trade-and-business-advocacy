<main>
   <x-partials::page.header 
      title="News & Insights"
      description="Discover the latest insights, trends, and expert advice in our blog. Stay informed and inspired with our in-depth articles on technology, business, and innovation."
      image="{{ asset('assets/images/banners/blog-page-banner.png') }}"
   />

      <div class="grid md:grid-cols-3 gap-5 col-md-10 pt-30 px-3! pb-70 mx-auto">
         <div class="md:col-span-2 py-10">
            @forelse ($this->posts as $post)
               <div class="col-md-12">
                  <x-posts.list :post="$post" />
               </div>
            @empty
               <div class="col-12">
                  <p class="text-center">No posts available at the moment. <br /> Please check back later.</p>
               </div>
            @endforelse

            <x-pagination :paginator="$this->posts" />
         </div>

         <div class="md:col-span-1 order-first order-md-last">
            <x-partials::blog.sidebar
               :categories="$this->categories"
               :tags="$this->tags"
               :recent-posts="$this->recentPosts"
            />
         </div>
      </div>  
</main>