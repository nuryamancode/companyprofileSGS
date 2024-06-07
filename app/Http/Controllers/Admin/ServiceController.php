<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $items = ServiceModel::latest()->get();
        $data = [
            "items" => $items,
        ];
        return view("admin.service.v-service", $data);
    }

    public function create()
    {
        return view("admin.service.v-service-create");
    }

    public function store()
    {
        request()->validate([
            'judul' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'text' => 'required',
        ], [
            'judul.required' => 'Judul Harap Diisi',
            'image.required' => 'Foto Harap Diisi',
            'image.image' => 'Harap Berupa Foto',
            'image.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image.max' => 'Foto maksimal 2MB',
            'description.required' => 'Deskripsi Harap Diisi',
            'text.required' => 'Text Harap Diisi',
        ]);
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'service/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        ServiceModel::create([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'description' => request('description'),
            'text' => request('text'),
            'image' => $imageName,
        ]);
        alert()->success('Data Berhasil Disimpan');
        return redirect()->route('admin.service.index');
    }
    public function update($id)
    {
        request()->validate([
            'judul' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
        ], [
            'judul.required' => 'Judul Harap Diisi',
            'image.required' => 'Foto Harap Diisi',
            'image.image' => 'Harap Berupa Foto',
            'image.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image.max' => 'Foto maksimal 2MB',
            'description.required' => 'Deskripsi Harap Diisi',
        ]);
        $items = ServiceModel::where('id', $id)->firstOrFail();
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'service/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        $items->update([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'description' => request('description'),
            'text' => request('text'),
            'image' => $imageName,
        ]);
        alert()->success('Data Berhasil Diubah');
        return redirect()->route('admin.service.index');
    }

    public function edit($id)
    {
        $item = ServiceModel::where('id', $id)->firstOrFail();
        $data = [
            'item' => $item,
        ];
        return view('admin.service.v-service-edit', $data);
    }

    public function destroy($id)
    {
        $item = ServiceModel::where('id', $id)->firstOrFail();
        if ($item->image) {
            $imagePath = public_path('service/' . $item->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $item->delete();
        alert()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.service.index');
    }
}
