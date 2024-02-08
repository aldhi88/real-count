@section('style')
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')

    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>

    window.addEventListener('reloadDt', param => {
        dtTable.ajax.reload();
    });

    var dtTable = $('#myTable').DataTable({
        processing: true,serverSide: true,pageLength: 25,
        order: [
            [2, 'asc'],
            [4, 'asc'],
        ],
        columnDefs: [
            { className: 'text-center', targets: [2,4] },
        ],
        ajax: '{{ route("master.calonDataDt") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'created_at', orderable: true, searchable:false },
            { data: 'partais.nama_partai', name: 'partais.nama_partai', orderable: true, searchable:true },
            { data: 'dapils.no_dapil', name: 'dapils.no_dapil', orderable: true, searchable:true },
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
