<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    // Display the contact form
    public function showForm()
    {
        return view('front.contactus');
    }

    // Handle the form submission
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'your-name' => 'required|string|max:255',
            'your-email' => 'required|email|max:255',
            'your-subject' => 'required|string|max:255',
            'your-message' => 'nullable|string',
        ]);

        // Process the data (e.g., send email, save to database, etc.)
        // For demonstration, we'll just return a success message
        
         // Save the data to the database
        Contact::create([
            'name' => $validatedData['your-name'],
            'email' => $validatedData['your-email'],
            'subject' => $validatedData['your-subject'],
            'message' => $validatedData['your-message'],
        ]);


        return redirect()->route('contact.form')->with('success', 'Your message has been sent successfully!');
    }
}
