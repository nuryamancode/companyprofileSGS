<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
    {
        $items = AboutModel::latest()->get();
        $data = [
            "items" => $items,
        ];
        return view("admin.about.v-about", $data);

    }

    public function create()
    {
        return view("admin.about.v-about-create");
    }

    public function store()
    {
        request()->validate([
            'judul' => 'required',
            'description' => 'required',
            'visi' => 'required',
            'misi' => ['required','array'],
            'image1' => 'image|mimes:jpg,jpeg,png|max:2048',
            'image2' => 'image|mimes:jpg,jpeg,png|max:2048',
            'image3' => 'image|mimes:jpg,jpeg,png|max:2048',
            'image4' => 'image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul Harap Diisi',
            'description.required' => 'Deskripsi Harap Diisi',
            'visi.required' => 'Visi Harap Diisi',
            'misi.required' => 'Misi Harap Diisi',
            'image1.image' => 'Harap Berupa Foto',
            'image2.image' => 'Harap Berupa Foto',
            'image3.image' => 'Harap Berupa Foto',
            'image4.image' => 'Harap Berupa Foto',
            'image1.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image2.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image3.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image4.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image5.mimes' => 'Foto mendukung format jpg,jpeg,png',
            'image1.max' => 'Foto maksimal 2MB',
            'image2.max' => 'Foto maksimal 2MB',
            'image3.max' => 'Foto maksimal 2MB',
            'image4.max' => 'Foto maksimal 2MB',
        ]);
        $imageName1 = null;
        $imageName2 = null;
        $imageName3 = null;
        $imageName4 = null;
        if (request()->file('image1')) {
            $image1 = request()->file('image1');
            $path1 = 'about/';
            $imageName1 = $image1->getClientOriginalName();
            $image1->move($path1, $imageName1);
        }
        if (request()->file('image2')) {
            $image2 = request()->file('image2');
            $path2 = 'about/';
            $imageName2 = $image2->getClientOriginalName();
            $image2->move($path2, $imageName2);
        }
        if (request()->file('image3')) {
            $image3 = request()->file('image3');
            $path3 = 'about/';
            $imageName3 = $image3->getClientOriginalName();
            $image3->move($path3, $imageName3);
        }
        if (request()->file('image4')) {
            $image4 = request()->file('image4');
            $path4 = 'about/';
            $imageName4 = $image4->getClientOriginalName();
            $image4->move($path4, $imageName4);
        }
        $misi = request('misi');
        $item = AboutModel::create([
            'id' => Str::uuid(),
            'judul' => request('judul'),
            'description' => request('description'),
            'visi' => request('visi'),
            'image1' => $imageName1,
            'image2' => $imageName2,
            'image3' => $imageName3,
            'image4' => $imageName4,
        ]);
        if (!empty($misi)) {
            foreach ($misi as $mission) {
                $item->misi()->create([
                    'id' => Str::uuid(),
                    'text'=> $mission,
                ]);
            }
        }
        alert()->success('Data Berhasil Disimpan');
        return redirect()->route('admin.about.index');
    }
    public function update($id)
{
    request()->validate([
        'judul' => 'required',
        'description' => 'required',
        'visi' => 'required',
        'misi' => ['required','array'],
        'image1' => 'image|mimes:jpg,jpeg,png|max:2048',
        'image2' => 'image|mimes:jpg,jpeg,png|max:2048',
        'image3' => 'image|mimes:jpg,jpeg,png|max:2048',
        'image4' => 'image|mimes:jpg,jpeg,png|max:2048',
    ], [
        'judul.required' => 'Judul Harap Diisi',
        'description.required' => 'Deskripsi Harap Diisi',
        'visi.required' => 'Visi Harap Diisi',
        'misi.required' => 'Misi Harap Diisi',
        'image1.image' => 'Harap Berupa Foto',
        'image2.image' => 'Harap Berupa Foto',
        'image3.image' => 'Harap Berupa Foto',
        'image4.image' => 'Harap Berupa Foto',
        'image1.mimes' => 'Foto mendukung format jpg,jpeg,png',
        'image2.mimes' => 'Foto mendukung format jpg,jpeg,png',
        'image3.mimes' => 'Foto mendukung format jpg,jpeg,png',
        'image4.mimes' => 'Foto mendukung format jpg,jpeg,png',
        'image1.max' => 'Foto maksimal 2MB',
        'image2.max' => 'Foto maksimal 2MB',
        'image3.max' => 'Foto maksimal 2MB',
        'image4.max' => 'Foto maksimal 2MB',
    ]);

    DB::transaction(function () use ($id) {
        $items = AboutModel::findOrFail($id);

        $imageName1 = $items->image1;
        $imageName2 = $items->image2;
        $imageName3 = $items->image3;
        $imageName4 = $items->image4;

        if (request()->file('image1')) {
            $image1 = request()->file('image1');
            $path1 = 'about/';
            $imageName1 = $image1->getClientOriginalName();
            $image1->move($path1, $imageName1);
        }
        if (request()->file('image2')) {
            $image2 = request()->file('image2');
            $path2 = 'about/';
            $imageName2 = $image2->getClientOriginalName();
            $image2->move($path2, $imageName2);
        }
        if (request()->file('image3')) {
            $image3 = request()->file('image3');
            $path3 = 'about/';
            $imageName3 = $image3->getClientOriginalName();
            $image3->move($path3, $imageName3);
        }
        if (request()->file('image4')) {
            $image4 = request()->file('image4');
            $path4 = 'about/';
            $imageName4 = $image4->getClientOriginalName();
            $image4->move($path4, $imageName4);
        }

        $items->update([
            'judul' => request('judul'),
            'description' => request('description'),
            'visi' => request('visi'),
            'image1' => $imageName1,
            'image2' => $imageName2,
            'image3' => $imageName3,
            'image4' => $imageName4,
        ]);

        $misi = request('misi');
        if (!empty($misi)) {
            $items->misi()->delete();
            foreach ($misi as $mission) {
                $items->misi()->create([
                    'id' => Str::uuid(),
                    'text' => $mission,
                ]);
            }
        }
    });

    alert()->success('Data Berhasil Diubah');
    return redirect()->route('admin.about.index');
}


    public function edit($id)
    {
        $item = AboutModel::with('misi')->where('id', $id)->firstOrFail();
        $data = [
            'item' => $item,
        ];
        return view('admin.about.v-about-edit', $data);
    }

    public function destroy($id)
    {
        $item = AboutModel::where('id', $id)->firstOrFail();
        if ($item->image1) {
            $imagePath1 = public_path('about/' . $item->image1);
            if (File::exists($imagePath1)) {
                File::delete($imagePath1);
            }
        }
        if ($item->image2) {
            $imagePath2 = public_path('about/' . $item->image2);
            if (File::exists($imagePath2)) {
                File::delete($imagePath2);
            }
        }
        if ($item->image3) {
            $imagePath3 = public_path('about/' . $item->image3);
            if (File::exists($imagePath3)) {
                File::delete($imagePath3);
            }
        }
        if ($item->image4) {
            $imagePath4 = public_path('about/' . $item->image4);
            if (File::exists($imagePath4)) {
                File::delete($imagePath4);
            }
        }
        $item->delete();
        alert()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.about.index');
    }
}
