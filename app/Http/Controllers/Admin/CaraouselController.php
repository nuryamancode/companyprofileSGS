<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CaraouselController extends Controller
{
    public function index()
    {
        $items = CarouselModel::latest()->get();
        $data = [
            "items" => $items,
        ];
        return view("admin.carousel.v-carousel", $data);
    }

    public function create()
    {
        return view("admin.carousel.v-carousel-create");
    }

    public function store()
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
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'carousel/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        CarouselModel::create([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'description' => request('description'),
            'image' => $imageName,
            'isbutton' => request('isbutton') ? 1 : 0,
        ]);
        alert()->success('Data Berhasil Disimpan');
        return redirect()->route('admin.carousel.index');
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
        $items = CarouselModel::where('id', $id)->firstOrFail();
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'carousel/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        $items->update([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'description' => request('description'),
            'image' => $imageName,
            'isbutton' => request('isbutton') ? 1 : 0,
        ]);
        alert()->success('Data Berhasil Diubah');
        return redirect()->route('admin.carousel.index');
    }

    public function edit($id)
    {
        $item = CarouselModel::where('id', $id)->firstOrFail();
        $data = [
            'item' => $item,
        ];
        return view('admin.carousel.v-carousel-edit', $data);
    }

    public function destroy($id)
    {
        $item = CarouselModel::where('id', $id)->firstOrFail();
        if ($item->image) {
            $imagePath = public_path('carousel/image/' . $item->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $item->delete();
        alert()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.carousel.index');
    }
}
