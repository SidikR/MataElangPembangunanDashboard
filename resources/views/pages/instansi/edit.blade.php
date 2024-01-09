@extends('layouts.main')
@section('content')
    <nav aria-label="breadcrumb mt-0 mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/instansi">Daftar Instansi</a></li>
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
                <form action={{ route('instansi.update', ['instansi' => $instansi->id]) }} method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset>
                        <div class="mb-3">
                            <label for="nama-instansi" class="form-label">Nama Instansi</label>
                            <input type="text" id="nama-instansi" class="form-control" placeholder="Nama Instansi"
                                value="{{ $instansi->nama }}" name="nama-instansi" required>
                        </div>
                        <div class="mb-3">
                            <label for="telepon-instansi" class="form-label">Nomor Telepon</label>
                            <input type="text" id="telepon-instansi" class="form-control" placeholder="Nomor Telepon"
                                value="{{ $instansi->telepon }}" name="telepon-instansi" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" cols="15" rows="5" name="alamat" required>{{ $instansi->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" cols="15" rows="5" name="deskripsi" required>{{ $instansi->deskripsi }}</textarea>
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
        var givenDate = '{{ $instansi->updated_at }}';
        calculateDaysAgo(givenDate, 'result');
    </script>
@endsection
