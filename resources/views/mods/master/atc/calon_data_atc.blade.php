@section('style')
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@push('push-style')
    <style>
        .select2-container .select2-selection--single{
            height: 30px !important;
        }
        .select2-container .select2-selection--single .select2-selection__rendered{
            line-height: 30px !important;
        }
    </style>
@endpush

@section('script')

    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script>

    window.addEventListener('reloadDt', param => {
        dtTable.ajax.reload();
    });

    $('#select2-calon').select2();

    var dtTable = $('#myTable').DataTable({
        processing: true,serverSide: true,pageLength: 25,
        lengthMenu: [25, 50, 100, 250, 500, 1000],
        order: [[1, 'asc'],[2, 'asc'],[4, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [1,4] },
        ],
        ajax: '{{ route("master.calonDataDt") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'created_at', orderable: true, searchable:false },
            { data: 'dapils.no_dapil', name: 'dapils.no_dapil', orderable: true, searchable:true },
            { data: 'partais.nama_partai', name: 'partai_id', orderable: true, searchable:true },
            { data: 'nama', name: 'nama', orderable: true, searchable:true },
            { data: 'no_urut', name: 'no_urut', orderable: true, searchable:true },
            { data: 'gender', name: 'gender', orderable: true, searchable:true },
        ],
        initComplete: function(settings){
            table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');
        }
    });

    </script>

@endsection
