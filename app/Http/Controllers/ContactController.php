<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
     public function store2(Request $request){
    
            // $request->validate([
            //     'name'=>'required',
            //     'email'=>'required',
            //     'srevice'=>'required',
            //     'date'=>'required',
            // ]);
            
            $package =new Contact();
            $package->name=$request['name'];
            $package->email=$request['email'];
            $package->subject=$request['subject'];
            $package->message=$request['message'];

            
            $package->save();

            Mail::to($package->email)->send(new ContactMail($package));

        return back()->with('success', 'Your message has been sent!');
        }
}
