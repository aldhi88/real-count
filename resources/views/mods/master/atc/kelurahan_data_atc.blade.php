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
            { className: 'text-center', targets: [] },
        ],
        ajax: '{{ route("master.kelurahanDataDt") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'id', orderable: true, searchable:false },
            { data: 'nama_kelurahan', name: 'nama_kelurahan', orderable: true, searchable:true },
            { data: 'kecamatans.nama_kecamatan', name: 'kecamatan_id', orderable: true, searchable:true },
        ],
        initComplete: function(settings){
            table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');
        }
    });

    </script>

@endsection
