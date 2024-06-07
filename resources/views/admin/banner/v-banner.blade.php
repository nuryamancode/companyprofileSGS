@extends('admin.base.v-app', ['title' => 'Banner'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Banner</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Banner</h4>
                            </div>
                            <div class="card-body">
                                @if ($items->count() == 0)
                                    <div class="text-right mb-3">
                                        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary btn-sm">
                                            Tambah Banner
                                        </a>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Banner About</th>
                                                <th>Banner Service</th>
                                                <th>Banner Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('banner/' . $item->about) }}" alt="Image"
                                                            class="img-fluid" style="width: 75%">
                                                    </td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('banner/' . $item->service) }}" alt="Image"
                                                            class="img-fluid" style="width: 75%">
                                                    </td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('banner/' . $item->contact) }}" alt="Image"
                                                            class="img-fluid" style="width: 75%">
                                                    </td>
                                                    <td>
                                                        <div class="mb-3">
                                                            <a href="{{ route('admin.banner.edit', $item->id) }}"
                                                                class="btn btn-info btn-sm">Edit</a>
                                                        </div>
                                                        <div class="mb-3">
                                                            <a href="#"
                                                                onclick="confirmDelete('{{ route('admin.banner.delete', $item->id) }}')"
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
