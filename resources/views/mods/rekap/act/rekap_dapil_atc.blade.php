@section('style')
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@push('push-style')
<style>
    .table td, .table th{
        padding: 5px !important;
    }
</style>
@endpush

@section('script')

    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        
    <script>

    $('#mySelect').change(function() {
        var url = $(this).val();
        window.location.href = url;
    });

    

     
    var dtTable1 = $('#myTable1').DataTable({
        processing: false,serverSide: true,pageLength: 25,
        searching: false, 
        lengthChange: false,
        paging: false,
        info: false,
        order: [[0, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [0,2] },
        ],
        ajax: {
            url: '{{ route("rekap.rekapDapilDt") }}',
            data: function(d){ 
                d.dapilId = 1;
            }
        },
        columns: [
            { data: 'no_urut', name: 'no_urut', orderable: true, searchable:false },
            { data: 'nama', name: 'nama', orderable: false, searchable:false },
            { data: 'total_suara', name: 'total_suara', orderable: false, searchable:false,render: function(data, type, row) {
                return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            } },
        ],
        initComplete: function(settings){
            // table = settings.oInstance.api();
            // initSearchCol(table,'#header-filter','search-col-dt');
        }
    });
    var dtTable2 = $('#myTable2').DataTable({
        processing: false,serverSide: true,pageLength: 25,
        searching: false, 
        lengthChange: false,
        paging: false,
        info: false,
        order: [[0, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [0,2] },
        ],
        ajax: {
            url: '{{ route("rekap.rekapDapilDt") }}',
            data: function(d){ 
                d.dapilId = 2;
            }
        },
        columns: [
            { data: 'no_urut', name: 'no_urut', orderable: true, searchable:false },
            { data: 'nama', name: 'nama', orderable: false, searchable:false },
            { data: 'total_suara', name: 'total_suara', orderable: false, searchable:false,render: function(data, type, row) {
                return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            } },
        ],
        initComplete: function(settings){
            // table = settings.oInstance.api();
            // initSearchCol(table,'#header-filter','search-col-dt');
        }
    });
    var dtTable3 = $('#myTable3').DataTable({
        processing: false,serverSide: true,pageLength: 25,
        searching: false, 
        lengthChange: false,
        paging: false,
        info: false,
        order: [[0, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [0,2] },
        ],
        ajax: {
            url: '{{ route("rekap.rekapDapilDt") }}',
            data: function(d){ 
                d.dapilId = 3;
            }
        },
        columns: [
            { data: 'no_urut', name: 'no_urut', orderable: true, searchable:false },
            { data: 'nama', name: 'nama', orderable: false, searchable:false },
            { data: 'total_suara', name: 'total_suara', orderable: false, searchable:false,render: function(data, type, row) {
                return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            } },
        ],
        initComplete: function(settings){
            // table = settings.oInstance.api();
            // initSearchCol(table,'#header-filter','search-col-dt');
        }
    });
    var dtTable4 = $('#myTable4').DataTable({
        processing: false,serverSide: true,pageLength: 25,
        searching: false, 
        lengthChange: false,
        paging: false,
        info: false,
        order: [[0, 'asc']],
        columnDefs: [
            { className: 'text-center', targets: [0,2] },
        ],
        ajax: {
            url: '{{ route("rekap.rekapDapilDt") }}',
            data: function(d){ 
                d.dapilId = 4;
            }
        },
        columns: [
            { data: 'no_urut', name: 'no_urut', orderable: true, searchable:false },
            { data: 'nama', name: 'nama', orderable: false, searchable:false },
            { data: 'total_suara', name: 'total_suara', orderable: false, searchable:false,render: function(data, type, row) {
                return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            } },
        ],
        initComplete: function(settings){
            // table = settings.oInstance.api();
            // initSearchCol(table,'#header-filter','search-col-dt');
        }
    });

    function reloadDataTable() {
        dtTable1.ajax.reload(); // Memuat ulang DataTable
        dtTable2.ajax.reload(); // Memuat ulang DataTable
        dtTable3.ajax.reload(); // Memuat ulang DataTable
        dtTable4.ajax.reload(); // Memuat ulang DataTable
    }

    setInterval(reloadDataTable, 2000);
    </script>

@endsection