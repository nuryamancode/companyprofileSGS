<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use App\Models\ArtikelModel;
use App\Models\BannerModel;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $article = ArtikelModel::latest()->get();
        $banner = BannerModel::first();
        $contact = ContactModel::first();
        $about = AboutModel::with('misi')->first();
        $data = [
            'article' => $article,
            'about' => $about,
            'contact' => $contact,
            'banner' => $banner,
        ];
        return view("landing-page.article.v-article", $data);
    }

    public function show($id){
        $data = ArtikelModel::where('id' , $id)->firstOrFail();
        $about = AboutModel::with('misi')->first();
        $contact = ContactModel::first();
        $array = [
            'data'=> $data,
            'about' => $about,
            'contact' => $contact,
        ];
        return view("landing-page.article.v-article-detail" , $array);
    }
}
