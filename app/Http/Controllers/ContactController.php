<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function create()
    {
        return view("about-us.contact");
    }
    public function store(Request $request)
    {
        request()->validate(
            [
                "name" => ["required", "between:2,255"],
                "email" => ["required", "email"],
                "message" => ["required", 'regex:/^[^<>]*$/'],
            ],
            [
                "name.required" => "Name is required",
                "email.required" => "Email is required",
                "name.between" => "Name has to be minimum 2 characters long",
            ]
        );
        $data = $request->all();
        Mail::to("eindwerk@laravel.be")->send(new Contact($data));
        return back()->with("status", "Form received, thank you!");
    }
}
