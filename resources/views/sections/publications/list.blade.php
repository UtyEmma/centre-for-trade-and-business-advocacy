@props([
    'publications' => collect(),
    'type' => null
])

@forelse ($publications as $publication)
    <div>
        <x-publications.item :type="$type" :publication="$publication" />
    </div>
@empty
    <div>
        <p>There is nothing here yet. Please check back later.</p>
    </div>
@endforelse