<x-filament::modal
    id="kanban--edit-record-modal"
    :slide-over="$this->getEditModalSlideOver()"
    :width="$this->getEditModalWidth()"
>
    <x-slot name="header">
        <x-filament::modal.heading>
            {{ $this->getEditModalTitle() }}
        </x-filament::modal.heading>
    </x-slot>

    <form wire:submit.prevent="editModalFormSubmitted" class="fi-form">
        <div class="fi-fo-field">
            <label for="name" class="fi-fo-field-label">
                <span class="fi-fo-field-label-text">Nombre</span>
                <span class="fi-fo-field-label-required">*</span>
            </label>
            <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.name')">
                <x-filament::input type="text" wire:model="editModalFormState.name" id="name" />
            </x-filament::input.wrapper>
            @error('editModalFormState.name')
                <p class="fi-fo-field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="fi-fo-field">
            <label for="email" class="fi-fo-field-label">
                <span class="fi-fo-field-label-text">Email</span>
            </label>
            <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.email')">
                <x-filament::input type="email" wire:model="editModalFormState.email" id="email" />
            </x-filament::input.wrapper>
            @error('editModalFormState.email')
                <p class="fi-fo-field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="fi-fo-field">
            <label for="phone" class="fi-fo-field-label">
                <span class="fi-fo-field-label-text">Teléfono</span>
            </label>
            <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.phone')">
                <x-filament::input type="text" wire:model="editModalFormState.phone" id="phone" />
            </x-filament::input.wrapper>
            @error('editModalFormState.phone')
                <p class="fi-fo-field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="fi-fo-field">
            <label for="course_interest" class="fi-fo-field-label">
                <span class="fi-fo-field-label-text">Curso de Interés</span>
            </label>
            <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.course_interest')">
                <x-filament::input.select wire:model="editModalFormState.course_interest" id="course_interest">
                    <option value="">Seleccionar...</option>
                    <option value="Tripulante de Cabina (Diario)">Tripulante de Cabina (Diario)</option>
                    <option value="Tripulante de Cabina (Sabatino)">Tripulante de Cabina (Sabatino)</option>
                    <option value="Técnico en Mantenimiento de Aeronaves">Técnico en Mantenimiento de Aeronaves</option>
                    <option value="Agente de Tráfico Aéreo">Agente de Tráfico Aéreo</option>
                    <option value="Inglés para Aeronáutica">Inglés para Aeronáutica</option>
                    <option value="Otro">Otro</option>
                </x-filament::input.select>
            </x-filament::input.wrapper>
            @error('editModalFormState.course_interest')
                <p class="fi-fo-field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="fi-fo-field">
            <label for="status" class="fi-fo-field-label">
                <span class="fi-fo-field-label-text">Estado</span>
            </label>
            <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.status')">
                <x-filament::input.select wire:model="editModalFormState.status" id="status">
                    @foreach(\App\Enums\LeadStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->getTitle() }}</option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>
            @error('editModalFormState.status')
                <p class="fi-fo-field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="fi-fo-field">
            <label for="notes" class="fi-fo-field-label">
                <span class="fi-fo-field-label-text">Notas</span>
            </label>
            <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.notes')">
                <textarea wire:model="editModalFormState.notes" id="notes" class="fi-input" rows="3"></textarea>
            </x-filament::input.wrapper>
            @error('editModalFormState.notes')
                <p class="fi-fo-field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="fi-fo-field">
            <label for="assigned_to" class="fi-fo-field-label">
                <span class="fi-fo-field-label-text">Asignado a</span>
            </label>
            <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.assigned_to')">
                <x-filament::input.select wire:model="editModalFormState.assigned_to" id="assigned_to">
                    <option value="">Sin asignar</option>
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>
            @error('editModalFormState.assigned_to')
                <p class="fi-fo-field-error">{{ $message }}</p>
            @enderror
        </div>
    </form>

    <x-slot name="footer">
        <x-filament::button type="submit" wire:click="editModalFormSubmitted">
            {{ $this->getEditModalSaveButtonLabel() }}
        </x-filament::button>

        <x-filament::button color="gray" x-on:click="isOpen = false">
            {{ $this->getEditModalCancelButtonLabel() }}
        </x-filament::button>
    </x-slot>
</x-filament::modal>
