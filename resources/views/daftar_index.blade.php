@extends('layouts.app_modern',  ['title' => 'Data Pendaftaran'])

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Data Pendaftaran</h3>
        @if(session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif
        <a href="/daftar/create" class="btn btn-primary">Tambah Data</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Daftar</th>
                    <th>Poli</th>
                    <th>Keluhan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->pasien->nama }}</td>
                        <td>{{ $item->pasien->jenis_kelamin }}</td>
                        <td>{{ $item->tanggal_daftar}}</td>
                        <td>{{ $item->poli_id }}</td>
                        <td>{{ $item->keluhan }}</td>
                        <td>
                            <a href="/daftar/{{ $item->id }}" class="btn btn-info">Detail</a>
                            <form action="/daftar/{{ $item->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?')">Hapus</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $daftar->links() !!}
    </div>

</div>
@endsection