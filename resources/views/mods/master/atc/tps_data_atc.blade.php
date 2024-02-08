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
        ajax: '{{ route("master.tpsDataDt") }}',
        columns: [
            { data: 'action', name: 'created_at', orderable: true, searchable:false },
            { data: 'dapil_id', name: 'dapil_id', orderable: true, searchable:true },
            { data: 'kecamatan_id', name: 'kecamatan_id', orderable: true, searchable:true },
            { data: 'kelurahan_id', name: 'kelurahan_id', orderable: true, searchable:true },
            { data: 'no_tps', name: 'no_tps', orderable: true, searchable:true },
            { data: 'jlh_pemilih', name: 'jlh_pemilih', orderable: true, searchable:true },
        ],
        initComplete: function(settings){
            table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');
        }
    });

    </script>

@endsection
