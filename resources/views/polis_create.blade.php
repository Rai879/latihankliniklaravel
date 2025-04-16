@extends('layouts.app_modern', ['title' => 'Edit Data Polis'])

@section('content')
<div class="card">
    <div class="card-body">
    <h3>Tambah Data Polis</h3>

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('polis.store') }}" method="POST">
        @csrf
        <label>Nama</label>
        <br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

        <label>Biaya</label>
        <br>
        <input type="text" name="biaya" value="{{ old('biaya') }}"><br><br>

        <label>Keterangan</label>
        <br>
        <input type="text" name="keterangan" value="{{ old('keterangan') }}"><br><br>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
</div>
@endsection
