<x-action-section>
    <x-slot name="title">
        {{ __('Panaikinti paskyra') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ištrinkite paskyrą visam laikui.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Kai paskyra bus ištrinta, visi jos ištekliai ir duomenys bus ištrinti visam laikui. Prieš ištrindami paskyrą, atsisiųskite visus duomenis ar informaciją, kurią norite išsaugoti.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Ištrinti paskyrą') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Ištrinti paskyrą') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Ar tikrai norite ištrinti savo paskyrą? Kai paskyra bus ištrinta, visi jos ištekliai ir duomenys bus ištrinti visam laikui. Įveskite slaptažodį, kad patvirtintumėte, jog norite visam laikui ištrinti paskyrą.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Slaptažodis') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Atšaukti.') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Ištrinti paskyrą') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
