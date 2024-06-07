@extends('admin.base.v-app', ['title' => 'Edit Client'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Client</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.client.index') }}">Back</a></div>
                    <div class="breadcrumb-item">Edit Client</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('admin.client.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input id="judul" type="name" class="form-control  @error('judul') is-invalid @enderror"
                            name="judul" tabindex="1" value='{{ $item->judul }}'>
                        <div class="invalid-feedback">
                            @error('judul')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label">Image</label>
                        <input id="image" type="file"
                            class="form-control @error('image') is-invalid
                        @enderror" name="image"
                            value="{{ old('image') }}" tabindex="2">
                        <small>Gambar harus dengan dimension maksimal 920 x 690, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-sm" tabindex="4">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
