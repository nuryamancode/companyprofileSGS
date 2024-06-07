@extends('admin.base.v-app', ['title' => 'Tambah Banner'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Banner</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Back</a></div>
                    <div class="breadcrumb-item">Tambah Banner</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="about" class="control-label">Banner About</label>
                        <input id="about" type="file"
                            class="form-control @error('about') is-invalid
                        @enderror" name="about"
                            value="{{ old('about') }}" tabindex="2">
                            <small>Gambar harus dengan dimension 1920 x 1080, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('about')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="service" class="control-label">Banner Service</label>
                        <input id="service" type="file"
                            class="form-control @error('service') is-invalid
                        @enderror" name="service"
                            value="{{ old('service') }}" tabindex="2">
                            <small>Gambar harus dengan dimension 1920 x 1080, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('service')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="control-label">Banner Contact</label>
                        <input id="contact" type="file"
                            class="form-control @error('contact') is-invalid
                        @enderror" name="contact"
                            value="{{ old('contact') }}" tabindex="2">
                            <small>Gambar harus dengan dimension 1920 x 1080, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('contact')
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
