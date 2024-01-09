@extends('layouts.main')
@section('content')
    <nav aria-label="breadcrumb mt-0 mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/data-kecamatan">Data Kecamatan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data['page_name'] }}</li>
        </ol>
    </nav>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    {{ $data['page_name'] }}
                </h5>
                <span><i class="bi bi-clock-history"></i> Updated : <span id="result"></span></span>
            </div>
            <div class="card-body">
                <form action={{ route('data-kecamatan.update', ['data_kecamatan' => $data_kecamatan->id_kecamatan]) }}
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset>
                        <div class="mb-3">
                            <label for="id_kecamatan" class="form-label">ID Kecamatan</label>
                            <input type="text" id="id_kecamatan" class="form-control" placeholder="Masukkan id kecamatan"
                                name="id_kecamatan" value="{{ $data_kecamatan->id_kecamatan }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="id_kabupaten" class="form-label">ID Kabupaten</label>
                            <input type="text" id="id_kabupaten" class="form-control" placeholder="Masukkan id kabupaten"
                                name="id_kabupaten" value="{{ $data_kecamatan->id_kabupaten }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="nama-data-kecamatan" class="form-label">Nama Kecmatan</label>
                            <input type="text" id="nama-data-kecamatan" name="name" class="form-control"
                                placeholder="Nama Kecamatan" value="{{ $data_kecamatan->name }}">
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-danger" onclick="goBack()">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script script>
        var givenDate = '{{ $data_kecamatan->updated_at }}';
        calculateDaysAgo(givenDate, 'result');
    </script>
@endsection
