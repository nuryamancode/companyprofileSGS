<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {
        $items = ClientModel::latest()->get();
        $data = [
            "items" => $items,
        ];
        return view("admin.client.v-client", $data);
    }

    public function create()
    {
        return view("admin.client.v-client-create");
    }

    public function store()
    {
        request()->validate([
            'judul' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul Harap Diisi',
            'image.required' => 'Foto Harap Diisi',
            'image.image' => 'Harap Berupa Foto',
            'image.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image.max' => 'Foto maksimal 2MB',
        ]);
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'client/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        ClientModel::create([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'image' => $imageName,
        ]);
        alert()->success('Data Berhasil Disimpan');
        return redirect()->route('admin.client.index');
    }
    public function update($id)
    {
        request()->validate([
            'judul' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul Harap Diisi',
            'image.required' => 'Foto Harap Diisi',
            'image.image' => 'Harap Berupa Foto',
            'image.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image.max' => 'Foto maksimal 2MB',
        ]);
        $items = ClientModel::where('id', $id)->firstOrFail();
        if (request()->file('image')) {
            $image = request()->file('image');
            $path = 'client/';
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
        }
        $items->update([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'image' => $imageName,
        ]);
        alert()->success('Data Berhasil Diubah');
        return redirect()->route('admin.client.index');
    }

    public function edit($id)
    {
        $item = ClientModel::where('id', $id)->firstOrFail();
        $data = [
            'item' => $item,
        ];
        return view('admin.client.v-client-edit', $data);
    }

    public function destroy($id)
    {
        $item = ClientModel::where('id', $id)->firstOrFail();
        if ($item->image) {
            $imagePath = public_path('client/' . $item->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $item->delete();
        alert()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.client.index');
    }
}
