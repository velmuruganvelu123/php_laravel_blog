<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function contactForm(){
        return view('contact.form');
        }

    public function submitContactForm(Request $request){
        $request->validate([
            'name'=>'required|max:10',
            'email'=>'required|email',
            'message'=>'required'
        ]);
        // dd($request->all());
        $data = $request->all();
        //store the data to database or send email
        return redirect()->route('contact.show')->with('status', 'your message has been sent sucessfully!');

    }
}
