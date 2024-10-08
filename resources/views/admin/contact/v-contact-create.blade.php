@extends('admin.base.v-app', ['title' => 'Tambah Contact'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Contact</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Back</a></div>
                    <div class="breadcrumb-item">Tambah Contact</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('admin.contact.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" class="form-control @error('address') is-invalid
                        @enderror"
                            id="address" rows="3" autofocus>{{ old('address') }}</textarea>
                        <div class="invalid-feedback">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-sm mb-2" id="addNoButton" tabindex="4">
                            Tambah No
                        </button>
                        <div id="NoContainer">
                            <div class="row">
                                <div class="col">
                                    <label for="nama">Nama</label>
                                    <input name="nama[]" class="form-control @error('nama') is-invalid @enderror mb-2"
                                        id="nama" value="{{ old('nama') }}">
                                    <div class="invalid-feedback">
                                        @error('nama')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="no_hp">No telepon</label>
                                    <input name="no_hp[]" class="form-control @error('no_hp') is-invalid @enderror mb-2"
                                        id="no_hp" value="{{ old('no_hp') }}">
                                    <div class="invalid-feedback">
                                        @error('no_hp')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"
                            name="email" tabindex="1" value='{{ old('email') }}'>
                        <div class="invalid-feedback">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link_gmaps">Link Address</label>
                        <input id="link_gmaps" type="text"
                            class="form-control  @error('link_gmaps') is-invalid @enderror" name="link_gmaps" tabindex="1"
                            value='{{ old('link_gmaps') }}'>
                        <div class="invalid-feedback">
                            @error('link_gmaps')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link_iframe">Link GMaps</label>
                        <input id="link_iframe" type="text"
                            class="form-control  @error('link_iframe') is-invalid @enderror" name="link_iframe"
                            tabindex="1" value='{{ old('link_iframe') }}'>
                        <small>Contoh Inputan :
                            https://www.google.com/maps/embed?
                        </small>
                        <div class="invalid-feedback">
                            @error('link_iframe')
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
        document.getElementById('addNoButton').addEventListener('click', function() {
            const noContainer = document.getElementById('NoContainer');
            const newRow = document.createElement('div');
            newRow.classList.add('row');
            const nameColumn = document.createElement('div');
            nameColumn.classList.add('col');
            const newNameLabel = document.createElement('label');
            newNameLabel.innerHTML = "Nama";
            const newNameInput = document.createElement('input');
            newNameInput.name = 'nama[]';
            newNameInput.classList.add('form-control', 'mb-2');
            newNameInput.type = 'text';
            nameColumn.appendChild(newNameLabel);
            nameColumn.appendChild(newNameInput);
            const phoneColumn = document.createElement('div');
            phoneColumn.classList.add('col');
            const newPhoneLabel = document.createElement('label');
            newPhoneLabel.innerHTML = "No Telepon";
            const newPhoneInput = document.createElement('input');
            newPhoneInput.name = 'no_hp[]';
            newPhoneInput.classList.add('form-control', 'mb-2');
            newPhoneInput.type = 'text';
            phoneColumn.appendChild(newPhoneLabel);
            phoneColumn.appendChild(newPhoneInput);
            newRow.appendChild(nameColumn);
            newRow.appendChild(phoneColumn);
            noContainer.appendChild(newRow);
        });
    </script>
@endsection
