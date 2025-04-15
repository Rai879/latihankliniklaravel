@extends('layouts.app_modern',  ['title' => 'Data Pasien'])

    @section('content')
<div class="card">
    <div class="card-body">
        <h3>Data Pasien</h3>
        <a href="/pasien/create" class="btn btn-primary">Tambah Data</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No Pasien</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Jenis</th>
                    <th>Tanggal Buat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Pasien as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_pasien }}</td>
                        <td>
                            @if ($item->photo)
                                <img src="{{ asset($item->photo) }}" height="50px" />
                            @endif
                            {{ $item->nama }}
                        </td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/pasien/{{ $item->id }}/edit " class="btn btn-warning">Edit</a>
                            <form action="/pasien/{{ $item->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?')">Hapus</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $Pasien->links() !!}
    </div>

</div>
@endsection