@extends('admin.base.v-app', ['title' => 'Service'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Service</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Service</h4>
                            </div>
                            <div class="card-body">
                                <div class="text-right mb-3">
                                    <a href="{{ route('admin.service.create') }}" class="btn btn-primary btn-sm">
                                        Tambah Service
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Text</th>
                                                <th>Deskripsi</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ $item->text }}</td>
                                                    <td>{{ \Illuminate\Support\Str::words($item->description, 50, '...') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('service/' . $item->image) }}"
                                                            alt="Image" class="img-fluid" style="width: 75%">
                                                    </td>
                                                    <td>
                                                        <div class="mb-3">
                                                            <a href="{{ route('admin.service.edit', $item->id) }}"
                                                                class="btn btn-info btn-sm">Edit</a>
                                                        </div>
                                                        <div class="mb-3">
                                                            <a href="#" onclick="confirmDelete('{{ route('admin.service.delete', $item->id) }}')"
                                                                data-confirm-delete="true"
                                                                class="btn btn-danger btn-sm">Hapus</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
