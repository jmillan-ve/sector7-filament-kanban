<x-filament-support::modal
    :id="'kanban--edit-record-modal'"
    :heading="$this->getEditModalTitle()"
    :width="$this->getEditModalWidth()"
    :slideOver="$this->getEditModalSlideOver()"
    closeEventName="close-modal"
    openEventName="open-modal"
>
    {{ $this->form }}

    <x-slot name="footer">
        <x-filament::button type="submit" wire:click="editModalFormSubmitted">
            {{ $this->getEditModalSaveButtonLabel() }}
        </x-filament::button>

        <x-filament::button color="gray" x-on:click="$dispatch('close-modal', { id: 'kanban--edit-record-modal' })">
            {{ $this->getEditModalCancelButtonLabel() }}
        </x-filament::button>
    </x-slot>
</x-filament-support::modal>
