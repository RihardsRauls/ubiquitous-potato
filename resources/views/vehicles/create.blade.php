<x-layout>
    <x-slot name="title">
        Add New Vehicle
    </x-slot>
    <h1>Add New Vehicle</h1>

    <form method="POST" action="{{ route('vehicles.store') }}">
        @csrf
        @include('vehicles.partials.form')
        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
</x-layout>
