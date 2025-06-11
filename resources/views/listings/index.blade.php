<x-layout>
    <x-slot name="title">
        Job Listings
    </x-slot>

    <h1 class="mb-4">Job Listings</h1>

    @if ($listings->count())
    
        <div class="row">
            @foreach ($listings as $listing)
                <div class="col-md-6 col-lg-4 mb-4">
                    <x-job-card :listing="$listing" />
                </div>
            @endforeach
        </div>

    @else
        <div class="alert alert-info">No job listings available.</div>
    @endif
</x-layout>
