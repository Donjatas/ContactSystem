<x-app-layout>
    <div class="py-12 text-center">
        <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="mx-auto max-w-md">

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Eksportuoti kontaktus</h2>

                                <form method="POST" action="{{ route('contacts.export') }}">
    @csrf
    <div class="form-group">
        <label for="export_format" class="block font-medium text-sm text-gray-700">Eksportavimo formatas:</label>
        <select class="form-input rounded-md shadow-sm mt-1" id="export_format" name="export_format">
            <option value="csv">CSV</option>
            <option value="excel">Excel</option>
            <option value="pdf">PDF</option>
        </select>
    </div>
    <x-button class="block mt-1 ma-w-xs">
        {{ __('Eksportuoti') }}
    </x-button>
</form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
