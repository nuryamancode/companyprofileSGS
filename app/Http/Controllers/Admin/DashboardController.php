<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use App\Models\ArtikelModel;
use App\Models\BannerModel;
use App\Models\CarouselModel;
use App\Models\ClientModel;
use App\Models\ContactModel;
use App\Models\DirectorModel;
use App\Models\ServiceModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahbanner = BannerModel::count();
        $jumlahcarousel = CarouselModel::count();
        $jumlahabout = AboutModel::count();
        $jumlahcontact = ContactModel::count();
        $jumlahdirector = DirectorModel::count();
        $jumlahservice = ServiceModel::count();
        $jumlahclient = ClientModel::count();
        $jumlahartikel = ArtikelModel::count();
        $data = [
            'jumlahservice' => $jumlahservice,
            'jumlahartikel' => $jumlahartikel,
            'jumlahclient' => $jumlahclient,
            'jumlahbanner' => $jumlahbanner,
            'jumlahcarousel' => $jumlahcarousel,
            'jumlahabout' => $jumlahabout,
            'jumlahcontact' => $jumlahcontact,
            'jumlahdirector' => $jumlahdirector,
        ];
        return view("admin.dashboard.v-dashboard", $data);
    }

    public function create()
    {
        return view("admin.dashboard.v-profil");
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            alert()->toast('Password tidak sesuai', 'error');
            return back();
        }

        User::whereId(auth()->user()->id)->update([
            'username' => $request->username,
            'password' => bcrypt($request->new_password),
        ]);
        alert()->success('Berhasil', 'Password berhasil diperbarui');
        return back();
    }
}
