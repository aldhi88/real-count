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
        order: [[0, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [0,1] },
        ],
        ajax: '{{ route("master.calonDataDt") }}',
        columns: [
            { data: 'action', name: 'created_at', orderable: true, searchable:false },
            { data: 'partai_id', name: 'partai_id', orderable: true, searchable:true },
            { data: 'dapil_id', name: 'dapil_id', orderable: true, searchable:true },
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
