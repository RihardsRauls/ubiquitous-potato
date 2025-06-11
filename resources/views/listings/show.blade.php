<x-layout>
    <x-slot name="title">Job</x-slot>

    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $listing->title }}</h1>
            <p><strong>Company:</strong> {{ $listing->company_name }}</p>
            <p><strong>Description:</strong> {{ $listing->description }}</p>
            <p><strong>Salary:</strong> {{ number_format($listing->salary) }}</p>
            <p><strong>Category:</strong> {{ $listing->jobCategory->category }}</p>
            <p><strong>Type:</strong> {{ $listing->employmentType->type }}</p>

            <div class="d-flex gap-2 mt-3">
                @can('update', $listing)
                    <a href="{{ route('listing.edit', $listing->id) }}" class="btn btn-primary">Edit</a>
                @endcan

                {{-- Delete Button (only for authorized users) --}}
                @can('delete', $listing)
                    <form action="{{ route('listing.destroy', $listing->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job listing?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endcan

                <a href="{{ route('listing.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>

    {{-- Job Application Section --}}
    <div class="card mt-4">
        <div class="card-body">
            <h4>Apply for this Job</h4>

            @auth
                @php
                    $userApplication = $listing->applications->where('user_id', auth()->id())->first();
                @endphp

                @if ($userApplication)
                    <div class="alert alert-success">
                        <strong>Your Cover Letter:</strong><br>
                        <p>{{ $userApplication->cover_letter }}</p>
                    </div>
                @else
                    <form action="{{ route('listing.apply', $listing) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cover_letter" class="form-label">Cover Letter</label>
                            <textarea id="cover_letter" name="cover_letter" class="form-control @error('cover_letter') is-invalid @enderror" rows="2">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</x-layout>


