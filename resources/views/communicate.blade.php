<x-app-layout>
    <div class="py-12 text-center">
        <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="mx-auto max-w-md">

                            <h1 class="mt-6 text-xl font-semibold text-gray-900">Žinutės</h1>
                            <br>

                    <form method="POST" action="{{ route('communications.store') }}">
  @csrf

  <div class="form-group">
    <label for="contact_id" class="block font-medium text-sm text-gray-700">Kontaktas:</label>
    <select class="form-input rounded-md shadow-sm mt-1" id="contact_id" name="contact_id">
      @foreach($contacts as $contact)
        <option value="{{ $contact->id }}">{{ $contact->name }} - {{ $contact->email }} - {{ $contact->phone }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="subject" class="block font-medium text-sm text-gray-700">Tema:</label>
    <input type="text" class="form-input rounded-md shadow-sm mt-1" id="subject" name="subject" required>
  </div>

  <div class="form-group">
    <label for="message" class="block font-medium text-sm text-gray-700">Žinutė:</label>
    <textarea class="form-input rounded-md shadow-sm mt-1" id="message" name="message" required></textarea>
  </div>

  <div class="form-group">
    <label for="type" class="block font-medium text-sm text-gray-700">Žinutės tipas:</label>
    <select class="form-input rounded-md shadow-sm mt-1" id="type" name="type">
      <option value="email">Email</option>
      <option value="sms">SMS</option>
    </select>
  </div>

  <x-button class="block mt-1 ma-w-xs">
      {{ __('Siųsti') }}
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
