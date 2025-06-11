<x-layout>
    <x-slot name="title">
        {{ __('messages.create') }} 
    </x-slot>
    <h1>{{ __('messages.create') }} </h1>

    <form method="POST" action="{{ route('vehicles.store') }}">
        @csrf
        @include('vehicles.partials.form')
        <button type="submit" class="btn btn-primary mt-2">{{ __('messages.save') }}</button>
    </form>
</x-layout>
