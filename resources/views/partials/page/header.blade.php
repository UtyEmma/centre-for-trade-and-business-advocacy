@props([
    'image' => asset('assets/img/breadcrumb/image-1.jpg'),
    'title' => 'Page Title',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec suscipit auctor dui, sed efficitur ipsum. Donec suscipit auctor dui, sed efficitur ipsum.',
    'breadcrumbs' => [
        // ['name' => 'Home', 'url' => route('home')],
        ['name' => $title],
    ],
    'hideHome' => false,
    'overlay' => false
])

{{-- bg-[#333] bg-blend-multiply --}}
<div wire:ignore class="tp-breadcrumb-ptb py-10! md:py-14!  z-index-1 {{ $overlay ? 'bg-secondary bg-blend-multiply' : '' }} bg-center bg-cover" data-background="{{ $image }}">
    {{-- <div class="tp-cc-chose-bg">
        <img src="{{ $image }}" alt="">
    </div> --}}
    <div class="container col-md-10 mx-auto">
        <div class="row">
            <div class="col-lg-7">
                <div class="tp-breadcrumb-content p-relative">
                    <ul class="tp-breadcrumb-list border-b-white!">
                        @if(!$hideHome)
                            <li>
                                <a class="fw-semibold text-white text-base" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="text-white text-base">
                                <x-heroicon-m-chevron-right class="size-5" />
                            </li> 
                        @endif
                        
                        @foreach ($breadcrumbs as $breadcrumb)
                            <li class="text-white">
                                @isset($breadcrumb['url'])
                                    <a class="fw-semibold text-white text-base" href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                                @else
                                    {{ $breadcrumb['name'] }}
                                @endisset
                            </li>

                            @if (!$loop->last)
                                <li class="text-white text-base">
                                    <x-heroicon-m-chevron-right class="size-5" />
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <h2 class="tp-breadcrumb-title md:text-5xl! leading-tight! text-white!">{{$title}}</h2>
                    <p class="text-white md:text-base">{{ $description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
