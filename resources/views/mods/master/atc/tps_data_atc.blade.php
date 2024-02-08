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
        order: [[1, 'asc'],[4, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [0,1,4,5] },
        ],
        ajax: '{{ route("master.tpsDataDt") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'created_at', orderable: true, searchable:false },
            { data: 'dapils.no_dapil', name: 'dapils.no_dapil', orderable: true, searchable:true },
            { data: 'kecamatans.nama_kecamatan', name: 'kecamatans.nama_kecamatan', orderable: true, searchable:true },
            { data: 'kelurahans.nama_kelurahan', name: 'kelurahans.nama_kelurahan', orderable: true, searchable:true },
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
