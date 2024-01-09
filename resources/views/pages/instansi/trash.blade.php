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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Instansi</th>
                                <th>Id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($trashedInstansi as $item)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalRestore{{ $item->id }}"
                                            class="btn btn-sm btn-danger">Restore</button>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalDeletePermanent{{ $item->id }}"
                                            class="btn btn-sm btn-danger">Delete Permanent</button>
                                    </td>
                                </tr>
                                @include('pages.instansi.restore')
                                @include('pages.instansi.delete-permanent')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
