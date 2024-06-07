<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\AboutModel;
use App\Models\BannerModel;
use App\Models\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $about = AboutModel::with('misi')->first();
        $contact = ContactModel::first();
        $banner = BannerModel::first();
        $data = [
            'about' => $about,
            'contact' => $contact,
            'banner' => $banner,
        ];
        return view("landing-page.contact.v-contact", $data);
    }

    public function send(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Rincian email
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Kirim email
        Mail::to('nuryamaniqbal@gmail.com')->send(new ContactMail($details));
        return back()->with('success', 'Message done sent. Thank you!');
    }
}
