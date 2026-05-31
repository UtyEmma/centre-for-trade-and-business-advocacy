<main>

   <x-partials::page.header
      title="Contact Us"
      description="Get in touch with us for enquiries, partnerships, research engagement, publications, events, and policy-related collaboration."
      image="{{ asset('assets/images/banners/contact-us-page-banner.png') }}"
   />

   <!-- contact area start -->
   <x-sections::contact />
   <!-- contact area end -->

   <x-sections::faqs :faqs="$pageFaqs" />

   {{-- <x-sections::contact.office-address />   --}}
</main>