<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $page_title = 'Contact Us';

        return view('pages.contact', compact('page_title'));
    }
    public function store(Request $request)
    {
        $request->validate(array(
            'name' => 'required',
            'email' => 'required',
            'website'          => 'required|unique:contacts',
            'message'          => 'required',
        ));

        $data = array(
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'website'       => $request->input('website'),
            'message'       => $request->input('message'),
            'ip'            => $request->ip(),
        );

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->website = $request->input('website');
        $contact->message = $request->input('message');
        $contact->page      = url()->previous();
        $contact->ip = $request->ip();

        if ($contact->save()){
            Mail::to($request->user())->send(new ContactQuery($data));
        }

        return response()->json(array('type' => 'success','message' => 'Thank you for contacting us! Our expert will get in touch with you asap.'));
    }
}
