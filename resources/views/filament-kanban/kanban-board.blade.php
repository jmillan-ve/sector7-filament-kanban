<x-filament-panels::page>
    <div x-data wire:ignore.self class="md:flex overflow-x-auto overflow-y-hidden gap-4 pb-4">
        @foreach($statuses as $status)
            @include($statusView, ['recordTitleAttribute' => $recordTitleAttribute])
        @endforeach

        <div wire:ignore>
            @include($scriptsView)
        </div>
    </div>

    @unless($disableEditModal)
        <x-filament-kanban::edit-record-modal/>
    @endunless
</x-filament-panels::page>
