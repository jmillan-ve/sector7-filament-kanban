@php
    $colorMap = [
        'primary' => ['top' => 'border-t-blue-500', 'bg' => 'bg-blue-50'],
        'warning' => ['top' => 'border-t-amber-500', 'bg' => 'bg-amber-50'],
        'purple' => ['top' => 'border-t-purple-500', 'bg' => 'bg-purple-50'],
        'success' => ['top' => 'border-t-emerald-500', 'bg' => 'bg-emerald-50'],
        'danger' => ['top' => 'border-t-red-500', 'bg' => 'bg-red-50'],
    ];
    $colors = $colorMap[$status['color'] ?? 'primary'] ?? $colorMap['primary'];
@endphp

<div class="md:w-[24rem] flex-shrink-0 mb-5 md:min-h-full flex flex-col">
    @include($headerView)

    <div
        data-status-id="{{ $status['id'] }}"
        class="flex flex-col flex-1 gap-2 p-3 rounded-xl border-t-4 {{ $colors['top'] }} {{ $colors['bg'] }} dark:bg-gray-800/80"
    >
        @foreach($status['records'] as $record)
            @include($recordView)
        @endforeach
    </div>
</div>
