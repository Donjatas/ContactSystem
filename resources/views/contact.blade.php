<x-app-layout>
    <div class="py-12">
        <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="GET" action="{{ route('show-contacts') }}">
            <div class="flex items-center justify-center w-3/4 mx-auto">
                <x-input class="block mt-1 w-full ma-w-xs" type="text" name="search" id="search" placeholder="Kontaktų paieška..." value="{{ request('search') }}" />
                <x-button class="block mt-1 ma-w-xs">
                    {{ __('Paieška') }}
                </x-button>
            </div>
        </form>
                            <br>
                            <br>
                            @if($contacts->isNotEmpty())
                            <table class="min-w-full w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Vardas
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Telefono numeris
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            El. paštas
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kompanija
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Pareigos
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Redaguoti
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Pašalinti
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
    @foreach($contacts as $contact)
    <form method="GET" action="{{ route('contacts.edit', ['contact' => $contact->id]) }}">
    @csrf
    <tr>
        <td class="px-2 py-1 whitespace-nowrap">
            <x-input class="block mt-1 mx-auto w-2/3" type="text" name="name" id="name" value="{{ $contact->name }}"/>
        </td>
        <td class="px-2 py-1 whitespace-nowrap">
            <x-input class="block mt-1 mx-auto w-2/3" type="text" name="phone" id="phone" value="{{ $contact->phone }}"/>
        </td>
        <td class="px-2 py-1 whitespace-nowrap">
            <x-input class="block mt-1 mx-auto w-2/3" type="email" name="email" id="email" value="{{ $contact->email }}"/>
        </td>
        <td class="px-2 py-1 whitespace-nowrap">
            <x-input class="block mt-1 mx-auto w-2/3" type="text" name="company" id="company" value="{{ $contact->company }}"/>
        </td>
        <td class="px-2 py-1 whitespace-nowrap">
            <x-input class="block mt-1 mx-auto w-2/3" type="text" name="job" id="job" value="{{ $contact->job }}"/>
        </td>
        <td class="px-2 py-1 whitespace-nowrap">
        <button class="block mt-1 mx-auto w-2/3" type="submit">Redaguoti</button>
    </form>
        </td>

        <td class="px-2 py-1 whitespace-nowrap">
            <form method="POST" action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}">
                @csrf
                @method('DELETE')
                <button class="block mt-1 mx-auto w-2/3" type="submit">Pašalinti</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

                            </table>
        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
