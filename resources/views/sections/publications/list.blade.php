@props([
    'publications' => collect(),
    'type' => null
])

@forelse ($publications as $publication)
    <x-publications.item :type="$type" :publication="$publication" />
@empty
    <div class="text-center mt-10">
        <p>There is nothing here yet. Please check back later.</p>
    </div>
@endforelse