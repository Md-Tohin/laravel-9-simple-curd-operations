<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 CURD </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-danger my-5 text-center">Laravel 9 CURD Operations</h3>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    @yield('scripts')

    <script src="{{ asset('lb/jquery-3.5.1.js') }}"></script>

    {{-- DataTable Start --}}
    <script src="{{ asset('lb/jquery-3.5.1.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('lb/datatable/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('lb/datatable/dataTables.bootstrap4.min.css') }}">
    <script src="{{ asset('lb/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lb/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

    {{-- Toastr Message start --}}
    <link href="{{ asset('lb/toastr/toastr.css') }}" rel="stylesheet" />
    <script src="{{ asset('lb/toastr/toastr.js') }}"></script>
    <script>
        $(document).ready(function() {
        @if (Session::has('message'))
            var type = "{{ Session::get('alert_type') }}";
            switch (type) {
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;            
                default:
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    });
    </script>

    {{-- Sweetalert Start --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).on('click', '#delete', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = href;
                } 
            });
        })
    </script>
</body>

</html>