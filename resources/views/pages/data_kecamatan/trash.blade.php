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
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Id Kecamatan</th>
                                <th>Nama Kecamatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($trashedKecamatan as $item)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $item->id_kecamatan }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalRestore{{ $index }}"
                                            class="btn btn-sm btn-danger">Restore</button>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalDeletePermanent{{ $index }}"
                                            class="btn btn-sm btn-danger">Delete Permanent</button>
                                    </td>
                                </tr>
                                @include('pages.data_kecamatan.restore')
                                @include('pages.data_kecamatan.delete-permanent')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
