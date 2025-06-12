<x-layout>
    <x-slot name="title">
        {{ __('messages.upload') }} 
    </x-slot>
    <h2>{{ __('messages.upload') }} {{ $vehicle->make }} {{ $vehicle->model }}</h2>

    <form method="POST" action="{{ route('photos.store', $vehicle) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="photo">{{ __('messages.choose') }}</label>
            <input type="file" name="photo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description">{{ __('messages.desc') }}</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="mb-3">
            <label for="date">{{ __('messages.date') }}</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">{{ __('messages.upload') }}</button>
        <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-secondary">{{ __('Back') }}</a>
    </form>
</x-layout>
