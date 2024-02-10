<div>
    <div class="row">
        <div class="col">
            
            <h6>Status Login :</h6>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped w-100">
                            <tr>
                                <th width="100" style="text-decoration: underline">Username :</th>
                                <td>{{Auth::user()->username}}</td>
                            </tr>
                            <tr>
                                <th width="100" style="text-decoration: underline">Password :</th>
                                <td>{{Auth::user()->password}}</td>
                            </tr>
                            <tr>
                                <th width="100" style="text-decoration: underline">Nama Saksi :</th>
                                <td>{{Auth::user()->nama}}</td>
                            </tr>
                            <tr>
                                <th width="100" style="text-decoration: underline">Dapil :</th>
                                <td>{{Auth::user()->tps->dapils->no_dapil}}</td>
                            </tr>
                            <tr>
                                <th width="100" style="text-decoration: underline">Kecamatan :</th>
                                <td>{{Auth::user()->tps->kecamatans->nama_kecamatan}}</td>
                            </tr>
                            <tr>
                                <th width="100" style="text-decoration: underline">Kelurahan :</th>
                                <td>{{Auth::user()->tps->kelurahans->nama_kelurahan}}</td>
                            </tr>
                            <tr>
                                <th width="100" style="text-decoration: underline">No.TPS :</th>
                                <td>{{Auth::user()->tps->no_tps}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>