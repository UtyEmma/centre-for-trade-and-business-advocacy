@props([
    'publications' => collect()
])

@forelse ($publications as $publication)
    <div>
        <x-publications.item :publication="$publication" />
    </div>
@empty
    <div>
        <p>There is nothing here yet. Please check back later.</p>
    </div>
@endforelse