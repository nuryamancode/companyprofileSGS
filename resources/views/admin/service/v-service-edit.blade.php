@extends('admin.base.v-app', ['title' => 'Edit Service'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Service</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Back</a></div>
                    <div class="breadcrumb-item">Edit Service</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('admin.service.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="text">Text</label>
                        <input id="text" type="text" class="form-control  @error('text') is-invalid @enderror"
                            name="text" tabindex="1" value='{{ $item->text }}'>
                        <div class="invalid-feedback">
                            @error('text')
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
                        <small>Gambar harus dengan dimension 550 x 450, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" class="form-control @error('description') is-invalid
                        @enderror"
                            id="description" rows="3">{{ $item->description }}</textarea>
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
