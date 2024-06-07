<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use App\Models\CarouselModel;
use App\Models\ClientModel;
use App\Models\ContactModel;
use App\Models\DirectorModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $carousel = CarouselModel::latest()->get();
        $client = ClientModel::latest()->get();
        $service = ServiceModel::latest()->paginate(6);
        $about = AboutModel::with('misi')->first();
        $contact = ContactModel::first();
        $director = DirectorModel::first();
        $data = [
            "carousel"=> $carousel,
            "about"=> $about,
            "service"=> $service,
            "client"=> $client,
            "contact"=> $contact,
            "director"=> $director,
        ];
        return view("landing-page.v-index", $data);
    }

    public function show($id){
        $carousel = CarouselModel::findOrFail($id);
        $about = AboutModel::with('misi')->first();
        $contact = ContactModel::first();
        $data = [
            "carousel"=> $carousel,
            'about' => $about,
            'contact' => $contact,
        ];
        return view("landing-page.v-carousel-detail", $data);
    }
}
