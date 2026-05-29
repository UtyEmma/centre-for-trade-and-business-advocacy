<x-layouts::base>
    @include('partials.layouts.header')

    {{ $slot }}

    @include('partials.layouts.footer')
</x-layouts::base>