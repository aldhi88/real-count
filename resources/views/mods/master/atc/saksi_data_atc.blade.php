@section('style')
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@push('push-style')
    <style>
        .select2-container{
            width: 100% !important;
        }
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

    function reloadDt(){
        dtTable.ajax.reload();
    }

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
            { data: 'nama_format', name: 'nama', orderable: false, searchable:true },
            { data: 'username', name: 'username', orderable: true, searchable:true },
            { data: 'password', name: 'password', orderable: true, searchable:true },
            { data: 'tps.dapils.no_dapil', name: 'tps.dapils.no_dapil', orderable: true, searchable:true },
            { data: 'tps.kecamatans.nama_kecamatan', name: 'tps.kecamatan_id', orderable: true, searchable:true },
            { data: 'tps.kelurahans.nama_kelurahan', name: 'tps.kelurahan_id', orderable: true, searchable:true },
            { data: 'tps.no_tps', name: 'tps.no_tps', orderable: true, searchable:true },
            { data: 'hp_format', name: 'hp', orderable: false, searchable:true },
            { data: 'hp_wa', name: 'hp', orderable: false, searchable:false },
            { data: 'status_kirim_format', name: 'status_kirim', orderable: false, searchable:true },
            { data: 'status_terima_format', name: 'status_terima', orderable: false, searchable:true },

        ],
        initComplete: function(settings){
            table = settings.oInstance.api();
            initSearchCol(table,'#header-filter','search-col-dt');

            $('table').on('click','h5.status-kirim',function(e){
                var value = $(this).attr('value');
                var id = $(this).attr('key');
                if (confirm('Yakin') == true) {
                    @this.dispatch('saksidata-statusKirim',{data:{'status_kirim':value,'id':id}});
                    if(value==0 || value=='0'){
                        $(this).find('span.badge').removeClass('badge-secondary').addClass('badge-success');
                        $(this).attr('value',1);
                    }else{
                        $(this).find('span.badge').removeClass('badge-success').addClass('badge-secondary');
                        $(this).attr('value',0);
                    }
                } else {
                    return false;
                }
                    // dtTable.ajax.reload();
            })

            $('table').on('click','h5.status-terima',function(e){
                var value = $(this).attr('value');
                var id = $(this).attr('key');
                if (confirm('Yakin') == true) {
                    @this.dispatch('saksidata-statusTerima',{data:{'status_terima':value,'id':id}});
                    if(value==0 || value=='0'){
                        $(this).find('span.badge').removeClass('badge-secondary').addClass('badge-success');
                        $(this).attr('value',1);
                    }else{
                        $(this).find('span.badge').removeClass('badge-success').addClass('badge-secondary');
                        $(this).attr('value',0);
                    }
                } else {
                    return false;
                }
                    // dtTable.ajax.reload();
            })

            $('table').on('change', 'input.input-hp', function() {
                var newValue = $(this).val();
                var user = $(this).attr('user');
                var pass = $(this).attr('pass');
                var id = $(this).attr('key');
                @this.dispatch('saksidata-hp',{data:{'hp':newValue,'id':id}});
                var link = `https://wa.me/`+newValue+`?text=https%3A%2F%2Frc.byfta.com%0A%0A`+user+`%0A`+pass+`%0A%0Abalas%20OK%20jika%20sudah%20menerima`;
                $('table a.btn-wa').find('#'+id).attr('href',);
            });

            $('table').on('change', 'input.input-nama', function() {
                var newValue = $(this).val();
                var id = $(this).attr('key');
                @this.dispatch('saksidata-nama',{data:{'nama':newValue,'id':id}});
            });
        }
    });

    </script>

@endsection
