@props([
    'variant' => 'primary',
    'icon' => null,
    'as' => 'button',
])

@php
    $classes = match($variant) {
        'primary' => 'tp-btn-event',
        'secondary' => 'tp-btn-event theme-bg-color',
        'outline' => 'tp-btn-event tp-btn-border',
        default => 'tp-btn-event',
    };
@endphp

<{{ $as }} {{ $attributes->class($classes) }}>
    <div class="button-text">{{$slot}}</div>

    @if ($icon)
        {{ $icon }}
    @else
        <div class="button-icon-wrapper">
            <img src="{{ asset('assets/img/finance/hero/btn-arrow.svg') }}" loading="lazy" width="16"
            height="16" alt="" class="button-image">
            <div class="button-dot"></div>
        </div>
    @endif
</{{ $as }}>