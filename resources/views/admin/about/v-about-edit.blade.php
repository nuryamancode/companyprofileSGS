@extends('admin.base.v-app', ['title' => 'Edit About'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit About</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.about.index') }}">Back</a></div>
                    <div class="breadcrumb-item">Edit About</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('admin.about.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea name="visi" class="form-control @error('visi') is-invalid
                        @enderror" id="visi"
                            rows="3">{{ $item->visi }}</textarea>
                        <div class="invalid-feedback">
                            @error('visi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <button type="button" class="btn btn-primary btn-sm mb-2" id="addMisiButton" tabindex="4">
                            Tambah Misi
                        </button>
                        <div id="misiContainer">
                            @foreach($item->misi as $mission)
                                <input name="misi[]" class="form-control mb-2 @error('misi') is-invalid @enderror" value="{{ old('misi.'.$loop->index, $mission->text) }}">
                                <div class="invalid-feedback">
                                    @error('misi.'.$loop->index)
                                        {{ $message }}
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image1" class="control-label">Foto 1</label>
                        <input id="image1" type="file"
                            class="form-control @error('image1') is-invalid
                        @enderror" name="image1"
                            value="{{ old('image1') }}" tabindex="2">
                            <small>Gambar harus dengan dimension 500 x 450, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('image1')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image2" class="control-label">Foto 2</label>
                        <input id="image2" type="file"
                            class="form-control @error('image2') is-invalid
                        @enderror" name="image2"
                            value="{{ old('image2') }}" tabindex="2">
                            <small>Gambar harus dengan dimension 500 x 450, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('image2')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image3" class="control-label">Foto 3</label>
                        <input id="image3" type="file"
                            class="form-control @error('image3') is-invalid
                        @enderror" name="image3"
                            value="{{ old('image3') }}" tabindex="2">
                            <small>Gambar harus dengan dimension 500 x 450, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('image3')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image4" class="control-label">Foto 4</label>
                        <input id="image4" type="file"
                            class="form-control @error('image4') is-invalid
                        @enderror" name="image4"
                            value="{{ old('image4') }}" tabindex="2">
                            <small>Gambar harus dengan dimension 500 x 450, agar lebih terlihat bagus</small>
                        <div class="invalid-feedback">
                            @error('image4')
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


    <script>
        document.getElementById('addMisiButton').addEventListener('click', function() {
            const misiContainer = document.getElementById('misiContainer');

            // Create a new input element
            const newInput = document.createElement('input');
            newInput.name = 'misi[]';
            newInput.classList.add('form-control', 'mb-2');
            newInput.type = 'text';

            // Create a new div for invalid feedback
            const newFeedback = document.createElement('div');
            newFeedback.classList.add('invalid-feedback');

            // Append the new input and feedback div to the misiContainer
            misiContainer.appendChild(newInput);
            misiContainer.appendChild(newFeedback);
        });
    </script>
@endsection
