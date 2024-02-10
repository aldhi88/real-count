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

    $('#select2-kelurahan').select2();

    var dtTable = $('#myTable').DataTable({
        processing: true,serverSide: true,pageLength: 25,
        lengthMenu: [25, 50, 100, 250, 500, 1000],
        order: [[0, 'asc'],[3, 'asc'],[4, 'asc'],[5, 'asc'],[6, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [0,2,3,4,5,6,7] },
        ],
        ajax: '{{ route("master.saksiDataDt") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'id', orderable: true, searchable:false },
            { data: 'nama', name: 'nama', orderable: true, searchable:true },
            { data: 'username', name: 'username', orderable: true, searchable:true },
            { data: 'password', name: 'password', orderable: true, searchable:true },
            { data: 'tps.dapils.no_dapil', name: 'tps.dapils.no_dapil', orderable: true, searchable:true },
            { data: 'tps.kecamatans.nama_kecamatan', name: 'tps.kecamatan_id', orderable: true, searchable:true },
            { data: 'tps.kelurahans.nama_kelurahan', name: 'tps.kelurahan_id', orderable: true, searchable:true },
            { data: 'tps.no_tps', name: 'tps.no_tps', orderable: true, searchable:true },
        ],
        initComplete: function(settings){
            table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');
        }
    });

    </script>

@endsection
