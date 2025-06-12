<x-layout>
    <x-slot name="title">
        {{ __('messages.title') }} 
    </x-slot>

    <h1>{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->year }})</h1>

    <p><strong>{{ __('messages.registration_number') }} :</strong> {{ $vehicle->registration_number }}</p>
    <p><strong>{{ __('messages.mileage') }} :</strong> {{ $vehicle->mileage }}</p>
    <p><strong>{{ __('messages.maintenance') }} :</strong> {{ $vehicle->maintenance_history }}</p>
    <p><strong>{{ __('messages.vin') }} :</strong> {{ $vehicle->vin }}</p>
    <p><strong>{{ __('messages.inspection') }} :</strong> {{ $vehicle->inspection_records }}</p>

    <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning">{{ __('messages.edit') }} </a>
    <a href="{{ route('photos.create', $vehicle) }}" class="btn btn-warning">{{ __('messages.upload') }}</a>

    <hr>

    <h3>{{ __('messages.photos') }} </h3>

    <div class="d-flex flex-wrap gap-3">
        @foreach($vehicle->photos as $photo)
            <div class="d-flex flex-column align-items-start border p-2" style="width: 200px;">
                <img src="{{ asset('storage/' . $photo->path) }}" class="img-thumbnail mb-2">
                <p class="mb-2">{{ $photo->description }} <br>({{ $photo->date }})</p>
                <form method="POST" action="{{ route('photos.destroy', $photo) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">{{ __('messages.delete') }}</button>
                </form>
            </div>
        @endforeach
    </div>

</x-layout>
