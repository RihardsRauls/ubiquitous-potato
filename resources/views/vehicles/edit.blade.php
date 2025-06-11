<x-layout>
    <x-slot name="title">
        {{ __('messages.edit') }} 
    </x-slot>
    <h1>{{ __('messages.edit') }} </h1>

    <form method="POST" action="{{ route('vehicles.update', $vehicle) }}">
        @csrf
        @method('PUT')
        @include('vehicles.partials.form')
        <button type="submit" class="btn btn-primary mt-2">{{ __('messages.update') }}</button>
    </form>
</x-layout>
