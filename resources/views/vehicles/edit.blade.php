<x-layout>
    <x-slot name="title">
        Edit Vehicle
    </x-slot>
    <h1>Edit Vehicle</h1>

    <form method="POST" action="{{ route('vehicles.update', $vehicle) }}">
        @csrf
        @method('PUT')
        @include('vehicles.partials.form')
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</x-layout>
