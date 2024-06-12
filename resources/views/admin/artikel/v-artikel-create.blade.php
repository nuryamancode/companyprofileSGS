@extends('admin.base.v-app', ['title' => 'Tambah Article'])
@section('content')
    {{--  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">  --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Article</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.artikel.index') }}">Back</a></div>
                    <div class="breadcrumb-item">Tambah Article</div>
                </div>
            </div>

        </section>
        <div class="section-body">
            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input id="judul" type="text" class="form-control  @error('judul') is-invalid @enderror"
                        name="judul" tabindex="1" value='{{ old('judul') }}' autofocus>
                    <div class="invalid-feedback">
                        @error('judul')
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
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="judul2">Judul Heading 2</label>
                    <div>
                        <small>Seperti contoh : <strong><i>"Langkah-langkah Pembuatan Surat Kuasa di
                                    Notaris"</i></strong></small>
                    </div>
                    <textarea name="judul2" class="form-control @error('judul2') is-invalid @enderror" id="judul2"
                        rows="3">{{ old('judul2') }}</textarea>
                    <div class="invalid-feedback">
                        @error('judul2')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                        rows="3">{{ old('description') }}</textarea>
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
    </div>

    <!-- Initialize Summernote -->
    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Masukkan Deskripsi Artikel',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                ]
            });
            $('#judul2').summernote({
                placeholder: 'Masukkan Judul Heading 2',
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    {{--  ['para', ['ul', 'ol', 'paragraph']],  --}}
                    {{--  ['table', ['table']],  --}}['insert', ['link', 'picture', 'video']],
                    {{--  ['view', ['fullscreen', 'codeview', 'help']]  --}}
                ]
            });
        });
    </script>
@endsection
