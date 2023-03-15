<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
                
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('contacts.store') }}" method="POST">
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="phone" class="block font-medium text-sm text-gray-700">Phone Number</label>
                                                <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                                                <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Add Contact
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
