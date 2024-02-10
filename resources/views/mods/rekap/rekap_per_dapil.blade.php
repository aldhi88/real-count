<div>
    <div class="row mt-3">
        <div class="col">
            <h2 class="text-center">{{strtoupper($title)}}</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-7">
            <h3 class="text-center p-2 bg-white d-flex align-items-center justify-content-center border border-secondary">
                <img src="{{ asset('assets/images/partai/partai_golongan_karya.png') }}" class="avatar-sm float-left" alt="">
                <span class="mx-auto">Partai Golongan Karya</span>
            </h3>
            {{-- <h3 class="text-center p-2" style="background-color: #FFFF00">Partai Golongan Karya</h3> --}}
            <div class="card">
                <div class="card-body">

                    <div class="dt-responsive table-responsive mt-2">
                        <div wire:ignore>
                            <table id="myTable" 
                                class="table table-bordered table-striped dt-responsive nowrap text-dark" 
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 22px">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="10">NO</th>
                                    <th class="text-center">NAMA CALON</th>
                                    {{-- <th class="text-center">Nama Partai</th> --}}
                                    <th class="text-center" width="50">TOTAL SUARA</th>
                                </tr>
    
                                </thead>
    
                                {{-- <thead id="header-filter">
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center"><input type="text" class="form-control form-control-sm text-center search-col-dt"></th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead> --}}
    
    
                                <tbody>
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h3 class="text-center p-2 bg-white d-flex align-items-center justify-content-center border border-secondary">
                <img src="{{ asset('assets/images/partai/partai_golongan_karya.png') }}" class="avatar-sm float-left invisible" alt="">
                <span class="mx-auto">Partai Lainnya</span>
            </h3>
            <div class="card">
                <div class="card-body">

                    <div class="dt-responsive table-responsive mt-2">
                        <div wire:ignore>
                            {{-- <table id="myTable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="10"></th>
                                    <th class="text-center">Nama Caleg</th>
                                    <th class="text-center">Nama Partai</th>
                                    <th class="text-center">Jumlah Suara</th>
                                </tr>
    
                                </thead>
    
                                <tbody>
    
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('mods.rekap.act.rekap_per_dapil_atc')
</div>