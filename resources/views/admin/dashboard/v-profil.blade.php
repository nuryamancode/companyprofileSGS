@extends('admin.base.v-app', ['title' => 'Edit Profil'])
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.dashboard.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username" type="name"
                                        class="form-control @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}"
                                        autocomplete="off">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="old_password" class="form-label">{{ __('Password Lama') }}</label>
                                    <div class="input-group">
                                        <input id="old_password" type="password" class="form-control password-toggle @error('old_password') is-invalid @enderror" name="old_password" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" onclick="togglePasswordVisibility(this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="new_password" class="form-label">{{ __('Password Baru') }}</label>
                                    <div class="input-group">
                                        <input id="new_password" type="password" class="form-control password-toggle @error('new_password') is-invalid @enderror" name="new_password" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" onclick="togglePasswordVisibility(this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation" class="form-label">{{ __('Konfirmasi Password') }}</label>
                                    <div class="input-group">
                                        <input id="new_password_confirmation" type="password" class="form-control password-toggle @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" onclick="togglePasswordVisibility(this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('new_password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <script>
        function togglePasswordVisibility(element) {
            var input = element.closest('.input-group').querySelector('input');
            var icon = element.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
        </script>
@endsection
