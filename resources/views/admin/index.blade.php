<x-layout>
    <x-slot name="title">{{ __('messages.auditlogs') }}</x-slot>

    <h1>{{ __('messages.auditlogs') }}</h1>

    @if($logs->isEmpty())
        <p>{{ __('messages.noauditlogsfound') }}</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('messages.user') }}</th>
                    <th>{{ __('messages.action') }}</th>
                    <th>{{ __('messages.ip') }}</th>
                    <th>{{ __('messages.date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->user->name ?? __('Unknown') }}</td>
                        <td>{{ $log->action }}</td>
                        <td>{{ $log->ip_address }}</td>
                        <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>
