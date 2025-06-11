<x-layout>
    <x-slot name="title">
        {{ __('messages.title') }} 
    </x-slot>

    <h1>{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->year }})</h1>

    <p><strong>{{ __('messages.mileage') }} :</strong> {{ $vehicle->mileage }}</p>
    <p><strong>{{ __('messages.maintenance') }} :</strong> {{ $vehicle->maintenance_history }}</p>
    <p><strong>{{ __('messages.inspection') }} :</strong> {{ $vehicle->inspection_records }}</p>

    <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning">{{ __('messages.edit') }} </a>

    <hr>

    <h3>{{ __('messages.upload') }} </h3>

    <!-- Toggle Button -->
    <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#uploadForm" aria-expanded="false" aria-controls="uploadForm">
        {{ __('messages.upload') }} {{ __('messages.photo') }}
    </button>

    <!-- Collapsible Form -->
    <div class="collapse" id="uploadForm">
        <div class="card card-body">
            <form method="POST" action="{{ route('photos.store', $vehicle) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="photo">{{ __('messages.choose') }} </label>
                    <input type="file" name="photo" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>{{ __('messages.desc') }} </label>
                    <input type="text" name="description" class="form-control">
                </div>

                <div class="mb-2">
                    <label>{{ __('messages.date') }} </label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">{{ __('messages.upload') }} </button>
            </form>
        </div>
    </div>

    <hr>
    <h3>{{ __('messages.photos') }} </h3>

    @foreach($vehicle->photos as $photo)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $photo->path) }}" width="200" class="img-thumbnail">
            <p>{{ $photo->description }} ({{ $photo->date }})</p>
            <form method="POST" action="{{ route('photos.destroy', $photo) }}">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">{{ __('messages.delete') }} </button>
            </form>
        </div>
    @endforeach
</x-layout>
