<x-layout>
    @include('partials._hero')
    @include('partials._search')


    @php
    // $test = 'Ahmed Elselly';    
    @endphp
    @unless (count($listings) == 0)
    @foreach($listings as $listing) 
        <x-listing-card :listing="$listing" />
    @endforeach
    @else
        <h2>No items were found</h2>
    @endunless
    <div class="mt-6 p-4">
        {{$listings -> links()}}
    </div>
</x-layout>