<x-layout>
    <x-slot name="title">
        {{ __('messages.upload') }} 
    </x-slot>

    <h2>{{ __('messages.upload') }} {{ $vehicle->make }} {{ $vehicle->model }}</h2>

    <form method="POST" action="{{ route('photos.store', $vehicle) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="photo">{{ __('messages.choose') }}</label>
            <input 
                type="file" 
                name="photo" 
                id="photo"
                class="form-control @error('photo') is-invalid @enderror" 
                required>
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">{{ __('messages.desc') }}</label>
            <input 
                type="text" 
                name="description" 
                id="description"
                class="form-control @error('description') is-invalid @enderror" 
                value="{{ old('description') }}">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date">{{ __('messages.date') }}</label>
            <input 
                type="date" 
                name="date" 
                id="date" 
                class="form-control @error('date') is-invalid @enderror" 
                required>
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <script>
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;
            document.getElementById('date').value = formattedDate;
        </script>

        <button type="submit" class="btn btn-success">{{ __('messages.upload') }}</button>
        <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-secondary">{{ __('Back') }}</a>
    </form>
</x-layout>

