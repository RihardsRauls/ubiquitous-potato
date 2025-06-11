<x-layout>
    <x-slot name="title">
        {{ auth()->user()->isAdmin() ? __('messages.adminveh') : __('messages.userveh') }}
    </x-slot>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="mb-0">{{ auth()->user()->isAdmin() ? __('messages.adminveh') : __('messages.userveh') }}</h1>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">{{ __('messages.add') }}</a>
    </div>



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
                        <p>{{ __('messages.mileage') }} : {{ $vehicle->mileage }}</p>

                        @if(auth()->user()->isAdmin())
                            <p><strong>{{ __('messages.owner') }}:</strong> {{ $vehicle->user->name }} ({{ $vehicle->user->email }})</p>
                        @endif

                        <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-sm btn-info">{{ __('messages.details') }} </a>
                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-warning">{{ __('messages.edit') }} </a>
                        <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">{{ __('messages.delete') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-layout>
