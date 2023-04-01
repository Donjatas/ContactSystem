<x-app-layout>
    <div class="py-12 text-center">
        <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="mx-auto max-w-md">

                            <h2 class="mt-6 text-xl font-semibold text-gray-900">Grupės sukūrimas</h2>

                            <br>

                            <form method="POST" action="{{ route('groups.store') }}">
                            @csrf
                            <div class="form-group inline">
                                <label for="name" class="block font-medium text-sm text-gray-700">Grupės pavadinimas:</label>
                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1" />
                                <x-button class="block mt-1 ma-w-xs">
                                    {{ __('Sukurti grupę') }}
                                </x-button>
                            </div>
                            </form>

<h2 class="mt-6 text-xl font-semibold text-gray-900">Žymos sukūrimas</h2>

<br>

<form method="POST" action="{{ route('tags.create') }}">
@csrf
                            <div class="form-group inline">
                                <label for="name" class="block font-medium text-sm text-gray-700">Žymos pavadinimas:</label>
                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1" />
                                <x-button class="block mt-1 ma-w-xs">
                                    {{ __('Sukurti žymą') }}
                                </x-button>
                            </div>
</form>

<br>

<h2 class="mt-6 text-xl font-semibold text-gray-900">Grupės ir žymos priskyrimas</h2>

<br>

<form action="{{ route('assign_group_tag.post') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="contact_id" class="block font-medium text-sm text-gray-700">Kontaktas:</label>
        <select class="form-input rounded-md shadow-sm mt-1" id="contact_id" name="contact_id">
            <option disabled selected value="">Pasirinkine kontaktą...</option>
            @foreach ($contacts as $contact)
                <option value="{{ $contact->id }}">{{ $contact->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="group_id" class="block font-medium text-sm text-gray-700">Grupė:</label>
        <select class="form-input rounded-md shadow-sm mt-1" id="group_id" name="group_id">
            <option disabled selected value="">Pasirinkine grupę..</option>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="tag_id" class="block font-medium text-sm text-gray-700">Žyma:</label>
        <select class="form-input rounded-md shadow-sm mt-1" id="tag_id" name="tag_id">
                <option disabled selected value="">Pasirinkine žymą...</option>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <x-button class="block mt-1 ma-w-xs">
                    {{ __('Priskirti grupę ir žymą') }}
                </x-button>
</form>

                            </div>                
                        </div>
                        <table class="table-auto w-full">
    <thead>
        <tr>
            <th class="px-4 py-2">Grupės pavadinimas</th>
            <th class="px-4 py-2">Veiksmai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($groups as $group)
        <tr>
            <td class="border px-4 py-2">{{ $group->name }}</td>
            <td class="border px-4 py-2">
                <form method="POST" action="{{ route('groups.destroy', $group->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900">Ištrinti</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<table class="table-auto w-full">
    <thead>
        <tr>
            <th class="px-4 py-2">Žymos pavadinimas</th>
            <th class="px-4 py-2">Veiksmai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
        <tr>
            <td class="border px-4 py-2">{{ $tag->name }}</td>
            <td class="border px-4 py-2">
                <form method="POST" action="{{ route('tags.destroy', $tag->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900">Ištrinti</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
                    </div>
                    <br>
                    @if($contacts->isNotEmpty())
                            <table class="min-w-full w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Vardas
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Grupė
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Žymė
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
    @foreach($contacts as $contact)
    <tr>
    <td class="px-2 py-1 whitespace-nowrap">
        {{ $contact->name }}
    </td>
    <td class="px-2 py-1 whitespace-nowrap">
        {{ $contact->group }}
    </td>
    <td class="px-2 py-1 whitespace-nowrap">
        {{ $contact->tag }}
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
</x-app-layout>