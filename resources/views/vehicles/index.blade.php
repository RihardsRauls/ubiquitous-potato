<x-layout>
    <x-slot name="title">
        {{ auth()->user()->isAdmin() ? 'All Vehicles' : 'Your Vehicles' }}
    </x-slot>
    <h1>{{ auth()->user()->isAdmin() ? 'All Vehicles (Admin View)' : 'Your Vehicles' }}</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Add Vehicle</a>

    @foreach($vehicles as $vehicle)
        <div class="card mb-3">
            <div class="row g-0">
                @if($vehicle->photos->isNotEmpty())
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $vehicle->photos->first()->path) }}" class="img-fluid rounded-start" alt="Vehicle image">
                    </div>
                @endif

                <div class="{{ $vehicle->photos->isNotEmpty() ? 'col-md-8' : 'col-12' }}">
                    <div class="card-body">
                        <h5>{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->year }})</h5>
                        <p>Mileage: {{ $vehicle->mileage }}</p>

                        @if(auth()->user()->isAdmin())
                            <p><strong>Owner:</strong> {{ $vehicle->user->name }} ({{ $vehicle->user->email }})</p>
                        @endif

                        <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-sm btn-info">Details</a>
                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this vehicle?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-layout>
