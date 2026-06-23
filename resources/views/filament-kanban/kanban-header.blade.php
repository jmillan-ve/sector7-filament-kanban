@php
    $colorMap = [
        'primary' => ['border' => '#3b82f6', 'bg' => '#eff6ff', 'dot' => '#60a5fa'],
        'warning' => ['border' => '#f59e0b', 'bg' => '#fffbeb', 'dot' => '#fbbf24'],
        'purple'  => ['border' => '#a855f7', 'bg' => '#faf5ff', 'dot' => '#c084fc'],
        'success' => ['border' => '#10b981', 'bg' => '#ecfdf5', 'dot' => '#34d399'],
        'danger'  => ['border' => '#ef4444', 'bg' => '#fef2f2', 'dot' => '#f87171'],
    ];
    $colors = $colorMap[$status['color'] ?? 'primary'] ?? $colorMap['primary'];
@endphp

<h3 class="mb-2 px-4 font-semibold text-lg flex items-center gap-2">
    <span class="w-3 h-3 rounded-full" style="background-color: {{ $colors['dot'] }}"></span>
    <span style="color: {{ $colors['border'] }}">{{ $status['title'] }}</span>
</h3>
