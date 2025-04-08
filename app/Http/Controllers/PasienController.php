<?php

namespace App\Http\Controllers;

use App;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\unlink\public_path;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['Pasien']= \App\Models\Pasien::latest()->paginate(10);
        return view("pasien_index" , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pasien_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            "photo" => "required|mimes:jpeg,png,jpg|max:10000",
            'nama' => 'required|min:3',
            'no_pasien' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
        ]);

        $pasien = new \App\Models\Pasien;
        $pasien->fill($requestData);

        // Save photo to 'public/uploads' directory
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $pasien->photo = 'uploads/' . $filename;
        }

        $pasien->save();
        return back()->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\pasien::findOrFail($id);
        return view("pasien_edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            "photo" => "nullable|mimes:jpeg,png,jpg|max:10000",
            'nama' => 'required|min:3',
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id, // Sesuaikan nama tabel
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
        ]);

        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($requestData);
        if (!$request->has('jenis_kelamin')) {
            $requestData['jenis_kelamin'] = $pasien->jenis_kelamin;
        }

        // Save photo to 'public/uploads' directory
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($pasien->photo && file_exists(public_path($pasien->photo))) {
                unlink(public_path($pasien->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $pasien->photo = 'uploads/' . $filename;
        }

        $pasien->save();
        return redirect('/pasien')->with('pesan', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pasien::findOrFail($id)->delete();
        if ($pasien->daftar->count() >=1) {
            return back()->with('pesan', 'Data tidak bisa dihapus karena sudah terdaftar');
        }

        $pasien = \App\Models\Pasien::findOrFail($id);
        if ($pasien->photo && file_exists(public_path($pasien->photo))) {
            unlink(public_path($pasien->photo));
        }
        $pasien->delete();
        return redirect('/pasien')->with('pesan', 'Data berhasil dihapus');
    }
}
