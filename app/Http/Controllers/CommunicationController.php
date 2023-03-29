<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommunicationEmail;
use Twilio\Rest\Client;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communications = Communication::all();
        return view('communications.index', compact('communications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        if ($contacts->isEmpty()) {
            return redirect()->route('contacts.create')->with('warning', 'You need to create a contact before you can communicate.');
        }
        return view('/communicate', ['contacts' => $contacts]);
    }
    
    

    
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $communication = new Communication();
    $communication->subject = $request->input('subject');
    $communication->message = $request->input('message');
    $communication->contact_id = $request->input('contact_id');
    $communication->type = $request->input('type');
    $communication->save();

    $contact = Contact::find($request->input('contact_id'));
    $kontaktas = User::find(Auth::id());

    if ($request->input('type') === 'email') {
        Mail::to($contact->email)->send(new CommunicationEmail($communication, $contact, $kontaktas));
    } else if ($request->input('type') === 'sms') {
        $twilioSid = env('TWILIO_ACCOUNT_SID');
        $twilioToken = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_SMS_FROM');
    
        // Create a new Twilio client
        $twilio = new Client($twilioSid, $twilioToken);
    
        // Send SMS message
        $message = $twilio->messages->create(
            $contact->phone, // Phone number(s) to send the message to
            [
                'from' => $twilioNumber, // Twilio phone number to send the message from
                'body' => 'Žinutę atsiuntė: ' . $kontaktas->name . ' ' . $kontaktas->lastname . '. Žinutė: ' . $request->input('message') . '. Kontaktai: ' . $kontaktas->email . '; ' . $kontaktas->phone,

            ]
        );
    
        // Check if the message was sent successfully
        if ($message->sid) {
            // Message sent successfully
        } else {
            // Message failed to send
        }
    }
    
    $contacts = Contact::where('user_id', Auth::id())->get();

    return view('communicate', ['contacts' => $contacts]);
}

    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $communication = Communication::findOrFail($id);
        $contacts = Contact::all();
        return view('communications.edit', compact('communication', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the request data
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'contact_id' => 'required|exists:contacts,id',
            'type' => 'required|string|in:email,sms',
            'scheduled_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        // update the communication
        $communication = Communication::findOrFail($id);
        $communication->subject = $request->input('subject');
        $communication->message = $request->input('message');
        $communication->contact_id = $request->input('contact_id');
        $communication->type = $request->input('type');
        $communication->scheduled_at = $request->input('scheduled_at');
        $communication->save();

        // redirect to the index page
        return redirect()->route('communications.index')->with('success', 'Communication updated successfully.');
    }

    public function destroy(Communication $communication)
    {
        $communication->delete();

        return redirect()->route('communications.index')
            ->with('success', 'Communication deleted successfully');
    }

}