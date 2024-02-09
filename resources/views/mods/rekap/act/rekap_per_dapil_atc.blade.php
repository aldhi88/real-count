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

    function reloadDataTable() {
        dtTable.ajax.reload(); // Memuat ulang DataTable
    }

    // Memulai interval untuk memuat ulang DataTable setiap 10 detik
    setInterval(reloadDataTable, 2000); 

    var dtTable = $('#myTable').DataTable({
        processing: false,serverSide: true,pageLength: 25,
        order: [[3, 'desc']],
        columnDefs: [
            { className: 'text-center', targets: [3] },
        ],
        ajax: {
            url: '{{ route("rekap.rekapPerDapilDt") }}',
            data: function(d){ 
                d.dapilId = {{$dapilId}};
            }
        },
        columns: [
            { data: 'no_urut', name: 'no_urut', orderable: true, searchable:false },
            { data: 'nama', name: 'nama', orderable: true, searchable:true },
            { data: 'partais.nama_partai', name: 'partais.nama_partai', orderable: true, searchable:true },
            { data: 'total_suara', name: 'total_suara', orderable: true, searchable:false },
        ],
        initComplete: function(settings){
            table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');
        }
    });

    </script>

@endsection