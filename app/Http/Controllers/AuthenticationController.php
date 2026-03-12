<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller {
    public function loginView(){
        return view('Authentication.Login');
    }

    public function loginSubmit(Request $request){
        $credentials = $request->validate([
            "email"    => "required|email",
            "password" => "required|min:8|max:20",
        ], [
            "email.required"    => "ইমেইল ঠিকানা প্রদান করা বাধ্যতামূলক।",
            "email.email"       => "অনুগ্রহ করে একটি বৈধ ইমেইল ঠিকানা প্রদান করুন।",
            "password.required" => "পাসওয়ার্ড প্রদান করা বাধ্যতামূলক।",
            "password.min"      => "পাসওয়ার্ড কমপক্ষে ৮ অক্ষরের হতে হবে।",
            "password.max"      => "পাসওয়ার্ড সর্বোচ্চ ২০ অক্ষরের মধ্যে হতে হবে।",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'সফলভাবে লগইন সম্পন্ন হয়েছে।');
        }

        return redirect()->back()->with('error', 'প্রদত্ত ইমেইল অথবা পাসওয়ার্ড সঠিক নয়।');
    }
}
