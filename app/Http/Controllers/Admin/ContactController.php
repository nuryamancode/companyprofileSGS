<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        $items = ContactModel::latest()->get();
        $data = [
            "items" => $items,
        ];
        return view("admin.contact.v-contact", $data);
    }

    public function create()
    {
        return view("admin.contact.v-contact-create");
    }

    public function store()
    {
        request()->validate([
            'email' => 'required|email',
            'address' => 'required',
            'link_iframe' => 'required',
            'nama' => ['required', 'array'],
            'no_hp' => ['required', 'array'],
        ], [
            'email.required' => 'Email Harap Diisi',
            'email.email' => 'Email Harap Berupa @',
            'address.required' => 'Alamat Harap Diisi',
            'nama.required' => 'Nama Harap Diisi',
            'no_hp.required' => 'No Telepon Harap Diisi',
            'link_iframe.required' => 'Link Iframe Google Maps Harap Diisi',
        ]);
        $nama = request('nama');
        $no_hp = request('no_hp');
        $item = ContactModel::create([
            'id' => Str::uuid(),
            'email' => request('email'),
            'address' => request('address'),
            'link_gmaps' => request('link_gmaps'),
            'link_iframe' => request('link_iframe'),
        ]);
        if (!empty($nama)) {
            foreach ($nama as $key => $value) {
                $item->telepon()->create([
                    'id' => Str::uuid(),
                    'nama' => $value,
                    'no_hp' => $no_hp[$key],
                ]);
            }
        }
        alert()->success('Data Berhasil Disimpan');
        return redirect()->route('admin.contact.index');
    }
    public function update($id)
{
    DB::transaction(function () use ($id) {
        request()->validate([
            'email' => 'required|email',
            'address' => 'required',
            'link_iframe' => 'required',
            'nama' => ['required', 'array'],
            'no_hp' => ['required', 'array'],
        ], [
            'email.required' => 'Email Harap Diisi',
            'email.email' => 'Email Harap Berupa @',
            'address.required' => 'Alamat Harap Diisi',
            'nama.required' => 'Nama Harap Diisi',
            'no_hp.required' => 'No Telepon Harap Diisi',
            'link_iframe.required' => 'Link Iframe Google Maps Harap Diisi',
        ]);

        $items = ContactModel::where('id', $id)->firstOrFail();
        $items->update([
            'email' => request('email'),
            'address' => request('address'),
            'link_gmaps' => request('link_gmaps'),
            'link_iframe' => request('link_iframe'),
        ]);

        $nama = request('nama');
        $no_hp = request('no_hp');
        if (!empty($nama)) {
            $items->telepon()->delete();
            foreach ($nama as $key => $value) {
                $items->telepon()->create([
                    'id' => Str::uuid(),
                    'nama' => $value,
                    'no_hp' => $no_hp[$key],
                ]);
            }
        }
    });

    alert()->success('Data Berhasil Diubah');
    return redirect()->route('admin.contact.index');
}

    public function edit($id)
    {
        $item = ContactModel::where('id', $id)->firstOrFail();
        $data = [
            'item' => $item,
        ];
        return view('admin.contact.v-contact-edit', $data);
    }

    public function destroy($id)
    {
        $item = ContactModel::where('id', $id)->firstOrFail();
        $item->delete();
        alert()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.contact.index');
    }
}
