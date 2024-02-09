<div>
    <div class="row">
        <div class="col">
            
            <h6>Status Login :</h6>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped w-100">
                            <tr>
                                <th class="bg-light text-dark">Username :</th>
                                <td>{{Auth::user()->username}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-dark">Nama Saksi :</th>
                                <td>{{Auth::user()->nama}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-dark">Dapil :</th>
                                <td>{{Auth::user()->tps->dapils->no_dapil}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-dark">Kecamatan :</th>
                                <td>{{Auth::user()->tps->kecamatans->nama_kecamatan}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-dark">Kelurahan :</th>
                                <td>{{Auth::user()->tps->kelurahans->nama_kelurahan}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light text-dark">No.TPS :</th>
                                <td>{{Auth::user()->tps->no_tps}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>