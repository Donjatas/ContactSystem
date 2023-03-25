<x-app-layout>
    <div class="py-12 text-center">
        <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="mx-auto max-w-md">

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Importuoti kontaktus</h2>

                                <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Pasirinkite failą:</label>
        <input type="file" class="mt-1 ma-w-xs" id="file" name="file">
    </div>
    <x-button class="block mt-1 ma-w-xs">
        {{ __('Importuoti') }}
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
