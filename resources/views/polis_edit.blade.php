@extends('layouts.app_modern', ['title' => 'Edit Data Polis'])

@section('content')
    <h1>Edit Data Polis</h1>

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('polis.update', $poli->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama', $poli->nama) }}"><br><br>

        <label>Biaya:</label>
        <input type="text" name="biaya" value="{{ old('biaya', $poli->biaya) }}"><br><br>

        <label>Keterangan:</label>
        <input type="text" name="keterangan" value="{{ old('keterangan', $poli->keterangan) }}"><br><br>

        <button type="submit">Update</button>
    </form>
@endsection
