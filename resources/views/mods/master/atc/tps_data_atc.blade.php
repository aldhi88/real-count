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
    $('#select2-kelurahan').select2();

    window.addEventListener('reloadDt', param => {
        dtTable.ajax.reload();
    });

    var dtTable = $('#myTable').DataTable({
        processing: true,serverSide: true,pageLength: 25,
        lengthMenu: [25, 50, 100, 250, 500, 1000],
        order: [[1, 'asc'],[2, 'asc'],[3, 'asc'],[4, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [0,1,4,5] },
        ],
        ajax: '{{ route("master.tpsDataDt") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'created_at', orderable: true, searchable:false },
            { data: 'dapils.no_dapil', name: 'dapils.no_dapil', orderable: true, searchable:true },
            { data: 'kecamatans.nama_kecamatan', name: 'kecamatan_id', orderable: true, searchable:true },
            { data: 'kelurahans.nama_kelurahan', name: 'kelurahan_id', orderable: true, searchable:true },
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
