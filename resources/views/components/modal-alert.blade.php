@if (session()->has('success'))
    @if (session('success'))
        <script>
            swal({
                title: 'Yeay success !!!',
                icon: 'success',
                text: '{{ session('message') }}'
            });
        </script>
    @else
        <script>
            swal({
                title: 'Whoops something went wrong. !!!',
                icon: 'error',
                text: '{{ session('message') }}'
            });
        </script>
    @endif
@endif