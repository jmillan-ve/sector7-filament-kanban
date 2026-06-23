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

    <form wire:submit.prevent="editModalFormSubmitted">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5 p-1">

            <div class="md:col-span-2 bg-gray-50 dark:bg-gray-900 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Información Personal</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre <span class="text-danger-500">*</span></label>
                        <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.name')">
                            <x-filament::input type="text" wire:model="editModalFormState.name" id="name" placeholder="Nombre completo" />
                        </x-filament::input.wrapper>
                        @error('editModalFormState.name')
                            <p class="text-sm text-danger-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.email')">
                            <x-filament::input type="email" wire:model="editModalFormState.email" id="email" placeholder="correo@ejemplo.com" />
                        </x-filament::input.wrapper>
                        @error('editModalFormState.email')
                            <p class="text-sm text-danger-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 bg-blue-50 dark:bg-blue-900/10 rounded-xl p-4 border border-blue-200 dark:border-blue-800">
                <p class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider mb-3">Curso & Contacto</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="course_interest" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Curso de Interés</label>
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
                            <p class="text-sm text-danger-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teléfono</label>
                        <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.phone')">
                            <x-filament::input type="text" wire:model="editModalFormState.phone" id="phone" placeholder="+58 412 123 4567" />
                        </x-filament::input.wrapper>
                        @error('editModalFormState.phone')
                            <p class="text-sm text-danger-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-amber-50 dark:bg-amber-900/10 rounded-xl p-4 border border-amber-200 dark:border-amber-800">
                <p class="text-xs font-semibold text-amber-600 dark:text-amber-400 uppercase tracking-wider mb-3">Estado</p>
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado del Lead</label>
                <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.status')">
                    <x-filament::input.select wire:model="editModalFormState.status" id="status">
                        @foreach(\App\Enums\LeadStatus::cases() as $status)
                            <option value="{{ $status->value }}">{{ $status->getTitle() }}</option>
                        @endforeach
                    </x-filament::input.select>
                </x-filament::input.wrapper>
                @error('editModalFormState.status')
                    <p class="text-sm text-danger-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/10 rounded-xl p-4 border border-purple-200 dark:border-purple-800">
                <p class="text-xs font-semibold text-purple-600 dark:text-purple-400 uppercase tracking-wider mb-3">Asignación</p>
                <label for="assigned_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Asignado a</label>
                <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.assigned_to')">
                    <x-filament::input.select wire:model="editModalFormState.assigned_to" id="assigned_to">
                        <option value="">Sin asignar</option>
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </x-filament::input.select>
                </x-filament::input.wrapper>
                @error('editModalFormState.assigned_to')
                    <p class="text-sm text-danger-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2 bg-green-50 dark:bg-green-900/10 rounded-xl p-4 border border-green-200 dark:border-green-800">
                <p class="text-xs font-semibold text-green-600 dark:text-green-400 uppercase tracking-wider mb-3">Notas</p>
                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Observaciones</label>
                <x-filament::input.wrapper :valid="! $errors->has('editModalFormState.notes')">
                    <textarea wire:model="editModalFormState.notes" id="notes" class="fi-input" rows="3" placeholder="Notas adicionales..."></textarea>
                </x-filament::input.wrapper>
                @error('editModalFormState.notes')
                    <p class="text-sm text-danger-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

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
