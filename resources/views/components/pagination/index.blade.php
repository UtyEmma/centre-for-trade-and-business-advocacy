@props([
    'paginator',
    'showSummary' => true,
    'scrollTo' => null,
])

@php
    $elements = \Illuminate\Pagination\UrlWindow::make($paginator)->get();
    $controlClasses = 'inline-flex min-h-10 min-w-10 items-center justify-center rounded border border-gray-200 bg-white px-3 text-sm font-medium text-gray-700 transition hover:border-primary hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-primary/30';
    $disabledClasses = 'inline-flex min-h-10 min-w-10 cursor-not-allowed items-center justify-center rounded border border-gray-200 bg-gray-50 px-3 text-sm font-medium text-gray-400';
    $activeClasses = 'inline-flex min-h-10 min-w-10 items-center justify-center rounded border border-primary bg-primary px-3 text-sm font-semibold text-white';
    $ellipsisClasses = 'inline-flex min-h-10 min-w-10 items-center justify-center px-2 text-sm font-medium text-gray-400';
    $summaryFirstItem = $paginator->firstItem() ?? 0;
    $summaryLastItem = $paginator->lastItem() ?? $paginator->count();
    $buildUrl = function (?string $url) use ($scrollTo): ?string {
        if ($url === null || blank($scrollTo)) {
            return $url;
        }

        return $url.'#'.ltrim((string) $scrollTo, '#');
    };
@endphp

@if ($paginator->hasPages())
    <nav {{ $attributes->class('mt-10 flex flex-col items-center justify-between gap-4 md:flex-row') }} role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        @if ($showSummary)
            <p class="text-sm text-gray-600">
                {{ __('Showing') }}
                <span class="font-semibold text-gray-900">{{ $summaryFirstItem }}</span>
                {{ __('to') }}
                <span class="font-semibold text-gray-900">{{ $summaryLastItem }}</span>
                {{ __('of') }}
                <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span>
                {{ __('results') }}
            </p>
        @endif

        <div class="flex flex-wrap items-center justify-center gap-2">
            @if ($paginator->onFirstPage())
                <span class="{{ $disabledClasses }}" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span aria-hidden="true">&lsaquo;</span>
                    <span class="sr-only">{{ __('pagination.previous') }}</span>
                </span>
            @else
                <a class="{{ $controlClasses }}" href="{{ $buildUrl($paginator->previousPageUrl()) }}" rel="prev" aria-label="{{ __('pagination.previous') }}">
                    <span aria-hidden="true">&lsaquo;</span>
                    <span class="sr-only">{{ __('pagination.previous') }}</span>
                </a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="{{ $ellipsisClasses }}" aria-disabled="true">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page === $paginator->currentPage())
                            <span class="{{ $activeClasses }}" aria-current="page">{{ $page }}</span>
                        @else
                            <a class="{{ $controlClasses }}" href="{{ $buildUrl($url) }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a class="{{ $controlClasses }}" href="{{ $buildUrl($paginator->nextPageUrl()) }}" rel="next" aria-label="{{ __('pagination.next') }}">
                    <span aria-hidden="true">&rsaquo;</span>
                    <span class="sr-only">{{ __('pagination.next') }}</span>
                </a>
            @else
                <span class="{{ $disabledClasses }}" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span aria-hidden="true">&rsaquo;</span>
                    <span class="sr-only">{{ __('pagination.next') }}</span>
                </span>
            @endif
        </div>
    </nav>
@endif
