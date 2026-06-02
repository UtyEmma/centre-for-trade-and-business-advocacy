<main>

         <x-partials::page.header 
            title="What We Do"
            description="We work across interconnected policy areas that shape equitable markets, effective regulation, institutional accountability, and sustainable development."
            image="{{ asset('assets/images/banners/services-page-banner.png') }}"
         />

         <x-sections::services.counter />
         
         <x-sections::home.services cta="" :services="$this->services" />

         <x-sections::home.approach />

         <x-sections::services.banner />

       <x-sections::teams.structure />         
   </main>
   