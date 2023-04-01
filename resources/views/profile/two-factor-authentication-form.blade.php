<x-action-section>
    <x-slot name="title">
        {{ __('Dviejų faktorių autentifikavimas') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Pridėkite papildomos paskyros apsaugos naudodami dviejų veiksnių autentifikavimą.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Užbaikite dviejų veiksnių autentifikavimo įgalinimą.') }}
                @else
                    {{ __('Įjungėte dviejų veiksnių autentifikavimą.') }}
                @endif
            @else
                {{ __('Neįjungėte dviejų veiksnių autentifikavimo.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('Kai įjungtas dviejų veiksnių autentifikavimas, autentifikavimo metu būsite paraginti įvesti saugų atsitiktinį prieigos raktą. Šį prieigos raktą galite gauti iš savo telefono „Google“ autentifikavimo priemonės programos.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('Norėdami baigti dviejų veiksnių autentifikavimo įgalinimą, nuskaitykite toliau pateiktą QR kodą naudodami telefono autentifikavimo programą arba įveskite sąrankos raktą ir pateikite sugeneruotą OTP kodą.') }}
                        @else
                            {{ __('Dabar įjungtas dviejų veiksnių autentifikavimas. Nuskaitykite šį QR kodą naudodami telefono autentifikavimo programą arba įveskite sąrankos raktą.') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Sąrankos raktas') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label for="code" value="{{ __('Kodas') }}" />

                        <x-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model.defer="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Išsaugokite šiuos atkūrimo kodus saugioje slaptažodžių tvarkyklėje. Jie gali būti naudojami norint atkurti prieigą prie paskyros, jei pametate dviejų veiksnių autentifikavimo įrenginį.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button type="button" wire:loading.attr="disabled">
                        {{ __('Įjungti') }}
                    </x-button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-secondary-button class="mr-3">
                            {{ __('Atkurti atkūrimo kodus') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button type="button" class="mr-3" wire:loading.attr="disabled">
                            {{ __('Patvirtinti') }}
                        </x-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <x-secondary-button class="mr-3">
                            {{ __('Parodyti atkūrimo kodus') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-secondary-button wire:loading.attr="disabled">
                            {{ __('Atšaukti') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-danger-button wire:loading.attr="disabled">
                            {{ __('Išjungti') }}
                        </x-danger-button>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>
