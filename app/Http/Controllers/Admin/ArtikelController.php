<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArtikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $items = ArtikelModel::latest()->get();
        $data = [
            "items" => $items,
        ];
        return view("admin.artikel.v-artikel", $data);
    }

    public function create()
    {
        return view("admin.artikel.v-artikel-create");
    }

    public function store()
    {
        request()->validate([
            'judul' => 'required',
            'judul2' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
        ], [
            'judul.required' => 'Judul Harap Diisi',
            'judul2.required' => 'Judul Heading 2 Harap Diisi',
            'image.required' => 'Foto Harap Diisi',
            'image.image' => 'Harap Berupa Foto',
            'image.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image.max' => 'Foto maksimal 2MB',
            'description.required' => 'Deskripsi Harap Diisi',
        ]);
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'artikel/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        ArtikelModel::create([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'judul2' => request('judul2'),
            'keterangan' => request('description'),
            'foto' => $imageName,
        ]);
        alert()->success('Data Berhasil Disimpan');
        return redirect()->route('admin.artikel.index');
    }
    public function update($id)
    {
        request()->validate([
            'judul' => 'required',
            'judul2' => 'required',
            'description' => 'required',
        ], [
            'judul.required' => 'Judul Harap Diisi',
            'judul2.required' => 'Judul Heading 2 Harap Diisi',
            'description.required' => 'Deskripsi Harap Diisi',
        ]);
        $items = ArtikelModel::where('id', $id)->firstOrFail();
        $imageName = $items->foto;
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'artikel/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        $items->update([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'judul2' => request('judul2'),
            'keterangan' => request('description'),
            'foto' => $imageName,
        ]);
        alert()->success('Data Berhasil Diubah');
        return redirect()->route('admin.artikel.index');
    }

    public function edit($id)
    {
        $item = ArtikelModel::where('id', $id)->firstOrFail();
        $data = [
            'item' => $item,
        ];
        return view('admin.artikel.v-artikel-edit', $data);
    }

    public function destroy($id)
    {
        $item = ArtikelModel::where('id', $id)->firstOrFail();
        if ($item->image) {
            $imagePath = public_path('artikel/' . $item->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $item->delete();
        alert()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.artikel.index');
    }
}
