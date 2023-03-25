<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Imports\ContactsImport;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Group;
use App\Models\Tag;
use League\Csv\Writer;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function contact()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('contact', compact('contacts'));
    }

    public function updatecontact(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'company' => '',
            'job' => '',
        ]);

        $contact->name = $validatedData['name'];
        $contact->phone = $validatedData['phone'];
        $contact->email = $validatedData['email'];
        $contact->company = $validatedData['company'];
        $contact->job = $validatedData['job'];
        $contact->save();

        return redirect()->route('contact');
    }

    public function destroycontact(Contact $contact)
{
    $contact->delete();

    return redirect()->route('contact');
}


    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('pradzia', compact('contacts'));
    }

    public function index2(Request $request)
    {
        
        $contacts = Contact::where('user_id', Auth::id())->get();
        if ($request->has('search')) {
            $search = $request->input('search');
            $contacts = $contacts->filter(function ($contact) use ($search) {
                return false !== stristr($contact->name, $search) ||
                       false !== stristr($contact->phone, $search) ||
                       false !== stristr($contact->email, $search) ||
                       false !== stristr($contact->company, $search) ||
                       false !== stristr($contact->job, $search);
            });
        }
        return view('contact', compact('contacts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'company' => '',
            'job' => '',
        ]);

        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->phone = $validatedData['phone'];
        $contact->email = $validatedData['email'];
        $contact->user_id = Auth::id();
        $contact->company = $validatedData['company'];
        $contact->job = $validatedData['job'];
        $contact->save();

        return redirect()->route('pradzia.index');
    }

    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'company' => '',
            'job' => '',
        ]);

        $contact->name = $validatedData['name'];
        $contact->phone = $validatedData['phone'];
        $contact->email = $validatedData['email'];
        $contact->company = $validatedData['company'];
        $contact->job = $validatedData['job'];
        $contact->save();

        return redirect()->route('pradzia.index');
    }

    public function destroy(Contact $contact)
{
    $contact->delete();

    return redirect()->route('pradzia.index');
}

public function assignGroupTag(Request $request)
{
    $contact = Contact::findOrFail($request->contact_id);
    $group = Group::findOrFail($request->group_id);
    $tag = Tag::findOrFail($request->tag_id);

    // update the group and tag of the contact
    $contact->group = $group->id;
    $contact->tag = $tag->id;
    $contact->save();

    return redirect()->route('assign_group_tag')->with('success', 'Tag assigned successfully.');
}

public function import(Request $request)
{
    Excel::import(new ContactsImport, $request->file('file'));
    return redirect()->back()->with('success', 'Contacts imported successfully.');
}

public function export(Request $request)
{
    $format = $request->input('export_format');
    $filename = 'contacts.' . $format;

    $contacts = Contact::where('user_id', auth()->id())->get();

    $csv = Writer::createFromString('');
    $csv->setDelimiter(',');
    $csv->setNewline("\r\n");

    // Add headers to CSV file
    $csv->insertOne(['Name', 'Phone', 'Email', 'Company', 'Job']);

    // Add contacts to CSV file
    foreach ($contacts as $contact) {
        $csv->insertOne([$contact->name, $contact->phone, $contact->email, $contact->company, $contact->job]);
    }

    // Set response headers for file download
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    return response($csv->getContent(), 200, $headers);
}




}
