<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('contacts.store') }}" method="POST">
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="name" class="block font-medium text-sm text-gray-700">Vardas</label>
                                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="phone" class="block font-medium text-sm text-gray-700">Telefono numeris</label>
                                                <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email" class="block font-medium text-sm text-gray-700">El. paštas</label>
                                                <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Pridėti kontaktą
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <br>
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
        <td class="px-6 py-4 whitespace-nowrap text-left">
            <x-input class="block mt-1 mx-auto w-2/3" type="text" name="name" id="name" value="{{ $contact->name }}"/>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <x-input class="block mt-1 mx-auto w-2/3" type="text" name="phone" id="phone" value="{{ $contact->phone }}"/>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <x-input class="block mt-1 mx-auto w-2/3" type="email" name="email" id="email" value="{{ $contact->email }}"/>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
        <button class="block mt-1 mx-auto w-2/3" type="submit">Redaguoti</button>
    </form>
        </td>

        <td class="px-6 py-4 whitespace-nowrap">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
