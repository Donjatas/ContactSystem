<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Communicate with Contact</h1>

                    <form method="POST" action="{{ route('communications.store') }}">
  @csrf

  <div class="form-group">
    <label for="contact_id">Select Contact</label>
    <select class="form-control" id="contact_id" name="contact_id">
      @foreach($contacts as $contact)
        <option value="{{ $contact->id }}">{{ $contact->name }} - {{ $contact->email }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" required>
  </div>

  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" id="message" name="message" required></textarea>
  </div>

  <div class="form-group">
    <label for="type">Type</label>
    <select class="form-control" id="type" name="type">
      <option value="email">Email</option>
      <option value="sms">SMS</option>
    </select>
  </div>

  <div class="form-group">
    <label for="scheduled_at">Scheduled Date and Time</label>
    <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at">
  </div>

  <button type="submit" class="btn btn-primary">Send</button>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
