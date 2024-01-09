@extends('layouts.main')
@section('content')
    <nav aria-label="breadcrumb mt-0 mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/data-kecamatan">Daftar Kecamatan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data['page_name'] }}</li>
        </ol>
    </nav>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    {{ $data['page_name'] }}
                </h5>
            </div>
            <div class="card-body">
                <form action={{ route('data-kecamatan.store') }} method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <fieldset>
                        <div class="mb-3">
                            <label for="id_kecamatan" class="form-label">ID Kecamatan</label>
                            <input type="text" id="id_kecamatan" class="form-control" placeholder="Masukkan id kecamatan"
                                name="id_kecamatan" value="{{ old('id_kecamatan') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_kabupaten" class="form-label">ID Kabupaten</label>
                            <input type="text" id="id_kabupaten" class="form-control" placeholder="Masukkan id kabupaten"
                                name="id_kabupaten" value="{{ old('id_kabupaten') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama-kecamatan" class="form-label">Nama Kecamatan</label>
                            <input type="text" id="nama-kecamatan" class="form-control" placeholder="Nama Kecamatan"
                                name="name" value="{{ old('name') }}" required>
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-danger" onclick="goBack()">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
