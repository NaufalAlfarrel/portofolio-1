<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = \App\Models\Profile::first();
    
        return view('profile.index', compact('profile'));
    }
    

    public function edit()
    {
        $profile = Profile::first();
        return view('profile.edit', compact('profile'));
    }

    public function create()
{
    return view('profile.create');
}

public function store(Request $request)
{
    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'nama' => 'required',
        'no_hp' => 'required',
        'jurusan' => 'required',
        'deskripsi' => 'required',
    ]);

    $profile = new Profile();

    if ($request->hasFile('foto')) {
        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);
        $profile->foto = 'images/' . $imageName;
    }

    $profile->nama = $request->nama;
    $profile->no_hp = $request->no_hp;
    $profile->jurusan = $request->jurusan;
    $profile->deskripsi = $request->deskripsi;
    $profile->save();

    return redirect()->route('profile.index')->with('success', 'Data berhasil ditambahkan!');
}

public function destroy($id)
{
    $profile = Profile::findOrFail($id);
    $profile->delete();

    return redirect()->route('profile.index')->with('success', 'Data berhasil dihapus!');
}

    public function update(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'deskripsi' => 'required',
        ]);

        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $profile->foto = 'images/' . $imageName;
        }

        $profile->nama = $request->nama;
        $profile->no_hp = $request->no_hp;
        $profile->jurusan = $request->jurusan;
        $profile->deskripsi = $request->deskripsi;
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
