@extends('backend.layouts.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <i class="icon_document_alt"></i> Riwayat Hidup
                    </h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i> <a href="{{ url('dashboard') }}">Home</a></li>
                        <li><i class="icon_document_alt"></i> Riwayat Hidup</li>
                        <li><i class="fa fa-files-o"></i> Pengalaman Kerja</li>
                    </ol>
                </div>
            </div>

            <!-- Notifikasi -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Card -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Pengalaman Kerja</h5>
                            <a href="{{ route('pengalaman_kerja.create') }}" class="btn btn-light btn-sm">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th><i class="icon_bag"></i> Nama</th>
                                            <th><i class="icon_document"></i> Jabatan</th>
                                            <th><i class="icon_calender"></i> Tahun Masuk</th>
                                            <th><i class="icon_calender"></i> Tahun Keluar</th>
                                            <th><i class="icon_cogs"></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengalaman_kerja as $item)
                                            <tr>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->jabatan }}</td>
                                                <td>{{ $item->tahun_masuk }}</td>
                                                <td>{{ $item->tahun_keluar }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- Tombol Edit -->
                                                        <a href="{{ route('pengalaman_kerja.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-edit"></i></a>

                                                        <!-- Tombol Delete -->
                                                        <div class="btn-group">
                                                            <form
                                                                action="{{ route('pengalaman_kerja.destroy', $item->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-warning"
                                                                    href="{{ route('pengalaman_kerja.edit', $item->id) }}">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    onclick="return confirm('Aapakah anda yakin ingin menghapus data ini?')">
                                                                    <i class="fa fa-trash-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- End Table Responsive -->
                        </div> <!-- End Card Body -->
                    </div> <!-- End Card -->
                </div>
            </div>
        </section>
    </section>
@endsection
