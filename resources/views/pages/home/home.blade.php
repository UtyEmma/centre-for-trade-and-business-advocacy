<main>
    <x-sections::home.hero />

    <x-sections::home.brands />

    <x-sections::home.about />

    <x-sections::home.services :services="$this->services" />

    <x-sections::home.approach  />

    <x-sections::home.banner />

    <x-sections::home.marquee />

    <x-sections::home.how-we-work />

    <x-sections::home.testimonials :testimonials="$this->testimonials" />

    <x-sections::teams :teamMembers="$this->teamMembers" />

    <x-sections::faqs :faqs="$this->faqs" />

    <x-sections::home.blog :posts="$this->posts" />    
</main>