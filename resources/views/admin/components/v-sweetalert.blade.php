@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('admin/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @if (session('success'))
        <script>
            $(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: true,
                    timer: 1500
                })
            })
        </script>
    @elseif(session('error'))
        <script>
            $(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    showConfirmButton: true,
                    timer: 1500
                })
            })
        </script>
    @endif
    <script>
        $(function() {
            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let action = $(this).data('action');
                        $('#formDelete').attr('action', action);
                        $('#formDelete').submit();
                    }
                })
            })
        })
    </script>
    <script>
        $(function() {
            $('body').on('click', '.btnAcc', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Ingin menyetujui pengajuan ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let action = $(this).data('action');
                        $('#formAcc').attr('action', action);
                        $('#formAcc').submit();
                    }
                })
            })
        })
    </script>
@endpush
