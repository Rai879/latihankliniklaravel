<?php

namespace App\Http\Controllers;

use App\Models\Polis;
use Illuminate\Http\Request;

class PolisController extends Controller
{
    public function index()
    {
        $data = Polis::all();
        return view('polis_index', compact('data'));
    }

    public function create()
    {
        return view('polis_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'biaya' => 'required',
        ]);

        Polis::create($request->all());
        return redirect()->route('polis.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Polis $poli)
    {
        return view('polis_edit', compact('poli'));
    }

    public function update(Request $request, Polis $poli)
    {
        $request->validate([
            'nama' => 'required',
            'biaya' => 'required',
        ]);

        $poli->update($request->all());
        return redirect()->route('polis.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Polis $poli)
    {
        $poli->delete();
        return redirect()->route('polis.index')->with('success', 'Data berhasil dihapus');
    }
}
