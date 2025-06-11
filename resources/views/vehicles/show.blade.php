<x-layout>
    <x-slot name="title">
        Vehicles
    </x-slot>
    <h1>{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->year }})</h1>

    <p><strong>Mileage:</strong> {{ $vehicle->mileage }}</p>
    <p><strong>Maintenance:</strong> {{ $vehicle->maintenance_history }}</p>
    <p><strong>Inspections:</strong> {{ $vehicle->inspection_records }}</p>

    <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Back</a>

    <hr>

    <h3>Upload a New Photo</h3>
    <form method="POST" action="{{ route('photos.store', $vehicle) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="photo">Choose Photo</label>
            <input type="file" name="photo" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Description (optional)</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="mb-2">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Upload</button>
    </form>

    <hr>
    <h3>Photos</h3>

    @foreach($vehicle->photos as $photo)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $photo->path) }}" width="200" class="img-thumbnail">
            <p>{{ $photo->description }} ({{ $photo->date }})</p>
            <form method="POST" action="{{ route('photos.destroy', $photo) }}">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this photo?')">Delete</button>
            </form>
        </div>
    @endforeach
</x-layout>
