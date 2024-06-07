<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use App\Models\BannerModel;
use App\Models\ContactModel;
use App\Models\DirectorModel;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = AboutModel::with('misi')->first();
        $contact = ContactModel::first();
        $director = DirectorModel::first();
        $banner = BannerModel::first();
        $array = [
            "about"=> $about,
            "contact"=> $contact,
            "director"=> $director,
            "banner"=> $banner,
        ];
        return view("landing-page.about.v-about" ,$array);
    }
}
