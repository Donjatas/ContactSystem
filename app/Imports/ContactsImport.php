<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ContactsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            try {
                Contact::create([
                    'name' => $row[0],
                    'phone' => $row[1],
                    'email' => $row[2],
                    'user_id' => auth()->id(),
                ]);
            } catch (\Exception $e) {
                \Log::error('Error importing row: ' . $e->getMessage());
            }
        }
    }
}
