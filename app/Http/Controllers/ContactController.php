<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
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

        return redirect()->route('pradzia');
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

        return redirect()->route('pradzia');
    }

    public function destroy(Contact $contact)
{
    $contact->delete();

    return redirect()->route('pradzia');
}


}
