<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscribeMail;

class SubscriberController extends Controller

{
    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:subscribers,email',
    ]);

   $subscriber = Subscriber::create([
        'email' => $request->email,
    ]);


    Mail::to($subscriber->email)->send(new SubscribeMail($subscriber));
    
    return back()->with('success', 'Thanks for subscribing!');
}
}
