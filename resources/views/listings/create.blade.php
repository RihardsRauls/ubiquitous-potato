<x-layout>
    <x-slot name="title">
        Create Job Listing
    </x-slot>

    <h1>Create Job Listing</h1>

    <form action="{{ route('listing.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
            
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" class="form-control @error('company_name') is-invalid @enderror">
            
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" id="salary" name="salary" value="{{ old('salary') }}" class="form-control @error('salary') is-invalid @enderror">
            
            @error('salary')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="job_category_id" class="form-label">Category</label>

            <select id="job_category_id" name="job_category_id" class="form-select @error('job_category_id') is-invalid @enderror">
                <option value="">Select Category</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('job_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category }}
                    </option>
                @endforeach
            </select>

            @error('job_category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="employment_type_id" class="form-label">Employment Type</label>

            <select id="employment_type_id" name="employment_type_id" class="form-select @error('employment_type_id') is-invalid @enderror">
                <option value="">Select Employment Type</option>

                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('employment_type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->type }}
                    </option>
                @endforeach
            </select>

            @error('employment_type_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @can('create', \App\Models\Listing::class)
        <!-- Man sāp ka man te nestrādāja vienkārši Listing:class-->
        <button type="submit" class="btn btn-primary">Create Listing</button>
        @endcan
    </form>
</x-layout>
