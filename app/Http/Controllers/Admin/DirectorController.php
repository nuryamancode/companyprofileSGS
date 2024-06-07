<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DirectorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DirectorController extends Controller
{
    public function index()
    {
        $items = DirectorModel::latest()->get();
        $data = [
            "items" => $items,
        ];
        return view("admin.director.v-director", $data);
    }

    public function create()
    {
        return view("admin.director.v-director-create");
    }

    public function store()
    {
        request()->validate([
            'nama' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
        ], [
            'nama.required' => 'Nama Harap Diisi',
            'image.required' => 'Foto Harap Diisi',
            'image.image' => 'Harap Berupa Foto',
            'image.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image.max' => 'Foto maksimal 2MB',
            'description.required' => 'Deskripsi Harap Diisi',
        ]);
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'director/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        DirectorModel::create([
            'id' => Str::uuid(),
            'nama' => request('nama'),
            'description' => request('description'),
            'image' => $imageName,
        ]);
        alert()->success('Data Berhasil Disimpan');
        return redirect()->route('admin.director.index');
    }
    public function update($id)
    {
        request()->validate([
            'nama' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
        ], [
            'nama.required' => 'Nama Harap Diisi',
            'image.required' => 'Foto Harap Diisi',
            'image.image' => 'Harap Berupa Foto',
            'image.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image.max' => 'Foto maksimal 2MB',
            'description.required' => 'Deskripsi Harap Diisi',
        ]);
        $items = DirectorModel::where('id', $id)->firstOrFail();
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'director/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        $items->update([
            'id' => Str::uuid(),
            'nama' => request('nama'),
            'description' => request('description'),
            'image' => $imageName,
        ]);
        alert()->success('Data Berhasil Diubah');
        return redirect()->route('admin.director.index');
    }

    public function edit($id)
    {
        $item = DirectorModel::where('id', $id)->firstOrFail();
        $data = [
            'item' => $item,
        ];
        return view('admin.director.v-director-edit', $data);
    }

    public function destroy($id)
    {
        $item = DirectorModel::where('id', $id)->firstOrFail();
        if ($item->image) {
            $imagePath = public_path('director/' . $item->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $item->delete();
        alert()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.director.index');
    }
}
