@php
    $colorMap = [
        'primary' => ['bg' => 'bg-blue-500', 'text' => 'text-blue-700', 'dot' => 'text-blue-400'],
        'warning' => ['bg' => 'bg-amber-500', 'text' => 'text-amber-700', 'dot' => 'text-amber-400'],
        'purple' => ['bg' => 'bg-purple-500', 'text' => 'text-purple-700', 'dot' => 'text-purple-400'],
        'success' => ['bg' => 'bg-emerald-500', 'text' => 'text-emerald-700', 'dot' => 'text-emerald-400'],
        'danger' => ['bg' => 'bg-red-500', 'text' => 'text-red-700', 'dot' => 'text-red-400'],
    ];
    $colors = $colorMap[$status['color'] ?? 'primary'] ?? $colorMap['primary'];
@endphp

<h3 class="mb-2 px-4 font-semibold text-lg flex items-center gap-2">
    <span class="w-3 h-3 rounded-full {{ $colors['dot'] }}" style="background-color: currentColor"></span>
    <span class="{{ $colors['text'] }}">{{ $status['title'] }}</span>
</h3>
