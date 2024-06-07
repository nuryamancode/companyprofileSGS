@extends('admin.base.v-app', ['title' => 'Contact'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Contact</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Contact</h4>
                            </div>
                            <div class="card-body">
                                <div class="text-right mb-3">
                                    @if ($items->count() == 0)
                                    <a href="{{ route('admin.contact.create') }}" class="btn btn-primary btn-sm">
                                        Tambah Contact
                                    </a>
                                @endif
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>Email</th>
                                                <th>Link Alamat</th>
                                                <th>Link GMaps</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>
                                                        <ol>
                                                            @foreach ($item->telepon as $phone)
                                                                <li>{{ $phone->nama }} - {{ $phone->no_hp }}</li>
                                                            @endforeach
                                                        </ol>
                                                    </td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->link_gmaps ?? 'Tidak ada link' }}</td>
                                                    <td>{{ $item->link_iframe ?? 'Tidak ada link' }}</td>
                                                    <td>
                                                        <div class="mb-3">
                                                            <a href="{{ route('admin.contact.edit', $item->id) }}"
                                                                class="btn btn-info btn-sm">Edit</a>
                                                        </div>
                                                        <div class="mb-3">
                                                            <a href="#" onclick="confirmDelete('{{ route('admin.contact.delete', $item->id) }}')"
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
