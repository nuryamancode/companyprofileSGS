@extends('admin.base.v-app', ['title' => 'Edit Director'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Director</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.director.index') }}">Back</a></div>
                    <div class="breadcrumb-item">Edit Director</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('admin.director.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input id="nama" type="name" class="form-control  @error('nama') is-invalid @enderror"
                            name="nama" tabindex="1" value='{{ $item->nama }}'>
                        <div class="invalid-feedback">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label">Foto</label>
                        <input id="image" type="file"
                            class="form-control @error('image') is-invalid
                        @enderror" name="image"
                            value="{{ old('image') }}" tabindex="2">
                            <small>Gambar harus dengan dimension maksimal 550 x 550, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('image1')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" class="form-control @error('description') is-invalid
                        @enderror" id="description"
                            rows="3">{{ $item->description }}</textarea>
                        <div class="invalid-feedback">
                            @error('description')
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
