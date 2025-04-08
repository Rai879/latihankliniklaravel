@extends('layouts.app', ['title' => 'Edit Data'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Edit Data <b>{{ $pasien->nama }}</b> </h3>
            <form action="/pasien/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group mb-3 ">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                    <img src="{{ asset($pasien->photo) }}" alt="foto pasien" class="img-thumbnail mt-2" width="50px">
                </div>
                <div class="form-group mb-3 ">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pasien->nama) }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mb-3 ">
                    <label for="no_pasien">No Pasien</label>
                    <input type="text" class="form-control" id="no_pasien" name="no_pasien" value="{{ old('no_pasien', $pasien->no_pasien) }}">
                    <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur', $pasien->umur) }}">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="laki-laki" {{ $pasien->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ $pasien->jenis_kelamin == 'perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $pasien->alamat) }}">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection