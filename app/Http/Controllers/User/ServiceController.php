<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use App\Models\BannerModel;
use App\Models\ContactModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $data = ServiceModel::all();
        $about = AboutModel::with('misi')->first();
        $contact = ContactModel::first();
        $banner = BannerModel::first();
        $array = [
            'data'=> $data,
            'about' => $about,
            'contact' => $contact,
            'banner' => $banner,
        ];
        return view("landing-page.service.v-service" , $array);
    }
    public function show($id){
        $data = ServiceModel::where('id' , $id)->firstOrFail();
        $about = AboutModel::with('misi')->first();
        $contact = ContactModel::first();
        $array = [
            'data'=> $data,
            'about' => $about,
            'contact' => $contact,
        ];
        return view("landing-page.service.v-service-detail" , $array);
    }
}
