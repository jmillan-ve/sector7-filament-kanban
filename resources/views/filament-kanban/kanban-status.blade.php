@php
    $colorMap = [
        'primary' => ['border' => '#3b82f6', 'bg' => '#eff6ff'],
        'warning' => ['border' => '#f59e0b', 'bg' => '#fffbeb'],
        'purple'  => ['border' => '#a855f7', 'bg' => '#faf5ff'],
        'success' => ['border' => '#10b981', 'bg' => '#ecfdf5'],
        'danger'  => ['border' => '#ef4444', 'bg' => '#fef2f2'],
    ];
    $colors = $colorMap[$status['color'] ?? 'primary'] ?? $colorMap['primary'];
@endphp

<div class="md:w-[24rem] flex-shrink-0 mb-5 md:min-h-full flex flex-col">
    @include($headerView)

    <div
        data-status-id="{{ $status['id'] }}"
        class="flex flex-col flex-1 gap-2 p-3 rounded-xl"
        style="border-top: 4px solid {{ $colors['border'] }}; background-color: {{ $colors['bg'] }};"
    >
        @foreach($status['records'] as $record)
            @include($recordView)
        @endforeach
    </div>
</div>
