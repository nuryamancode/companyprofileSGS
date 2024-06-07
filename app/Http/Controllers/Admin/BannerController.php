<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $items = BannerModel::latest()->get();
        $data = [
            "items" => $items,
        ];
        return view("admin.banner.v-banner", $data);
    }

    public function create()
    {
        return view("admin.banner.v-banner-create");
    }

    public function store()
    {
        request()->validate([
            'about' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'service' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'contact' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'about.required' => 'Foto Harap Diisi',
            'about.image' => 'Harap Berupa Foto',
            'about.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'about.max' => 'Foto maksimal 2MB',
            'service.required' => 'Foto Harap Diisi',
            'service.image' => 'Harap Berupa Foto',
            'service.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'service.max' => 'Foto maksimal 2MB',
            'contact.required' => 'Foto Harap Diisi',
            'contact.image' => 'Harap Berupa Foto',
            'contact.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'contact.max' => 'Foto maksimal 2MB',
        ]);
        $aboutName = null;
        $serviceName = null;
        $contactName = null;
        if (request()->file('about')) {
            $about = request()->file('about');
            $aboutName = $about->getClientOriginalName();
            $path = 'banner/';
            $about->move($path, $aboutName);
        }
        if (request()->file('service')) {
            $service = request()->file('service');
            $serviceName = $service->getClientOriginalName();
            $path = 'banner/';
            $service->move($path, $serviceName);
        }
        if (request()->file('contact')) {
            $contact = request()->file('contact');
            $contactName = $contact->getClientOriginalName();
            $path = 'banner/';
            $contact->move($path, $contactName);
        }
        BannerModel::create([
            'id' => Str::uuid(),
            'about' => $aboutName,
            'service' => $serviceName,
            'contact' => $contactName,
        ]);
        alert()->success('Data Berhasil Disimpan');
        return redirect()->route('admin.banner.index');
    }
    public function update($id)
    {
        request()->validate([
            'about' => 'image|mimes:jpg,jpeg,png|max:2048',
            'service' => 'image|mimes:jpg,jpeg,png|max:2048',
            'contact' => 'image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'about.image' => 'Harap Berupa Foto',
            'about.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'about.max' => 'Foto maksimal 2MB',
            'service.image' => 'Harap Berupa Foto',
            'service.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'service.max' => 'Foto maksimal 2MB',
            'contact.image' => 'Harap Berupa Foto',
            'contact.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'contact.max' => 'Foto maksimal 2MB',
        ]);
        $items = BannerModel::where('id', $id)->firstOrFail();
        $aboutName = $items->about;
        $serviceName = $items->service;
        $contactName = $items->contact;
        if (request()->file('about')) {
            $about = request()->file('about');
            $path = 'banner/';
            $aboutName = $about->getClientOriginalName();
            $about->move($path, $aboutName);
        }
        if (request()->file('service')) {
            $service = request()->file('service');
            $serviceName = $service->getClientOriginalName();
            $path = 'banner/';
            $service->move($path, $serviceName);
        }
        if (request()->file('contact')) {
            $contact = request()->file('contact');
            $path = 'banner/';
            $contactName = $contact->getClientOriginalName();
            $contact->move($path, $contactName);
        }
        $items->update([
            'id' => Str::uuid(),
            'about' => $aboutName,
            'service' => $serviceName,
            'contact' => $contactName,
        ]);
        alert()->success('Data Berhasil Diubah');
        return redirect()->route('admin.banner.index');
    }

    public function edit($id)
    {
        $item = BannerModel::where('id', $id)->firstOrFail();
        $data = [
            'item' => $item,
        ];
        return view('admin.banner.v-banner-edit', $data);
    }

    public function destroy($id)
    {
        $item = BannerModel::where('id', $id)->firstOrFail();
        if ($item->about) {
            $aboutPath = public_path('banner/' . $item->about);
            if (File::exists($aboutPath)) {
                File::delete($aboutPath);
            }
        }
        if ($item->service) {
            $servicePath = public_path('banner/' . $item->service);
            if (File::exists($servicePath)) {
                File::delete($servicePath);
            }
        }
        if ($item->contact) {
            $contactPath = public_path('banner/' . $item->contact);
            if (File::exists($contactPath)) {
                File::delete($contactPath);
            }
        }
        $item->delete();
        alert()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.banner.index');
    }
}
