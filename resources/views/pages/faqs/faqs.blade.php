
<main>
    <x-partials::page.header 
        title="Frequently Asked Questions"
        :breadcrumbs="[
            ['name' => 'Frequently Asked Questions'],
        ]" 
    />

    <x-sections::faqs 
        :faqs="$this->faqs"
    />
</main>