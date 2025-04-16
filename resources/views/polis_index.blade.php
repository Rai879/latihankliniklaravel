@extends('layouts.app_modern', ['title' => 'Data Polis'])

@section('content')
<div class="card">
    <div class="card-body">
        
    <h3>Data Polis</h3>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('polis.create') }}" class="btn btn-primary">Tambah Data</a>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Biaya</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->biaya }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('polis.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('polis.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</div>
@endsection
