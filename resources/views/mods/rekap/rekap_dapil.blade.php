<div>
    <div class="row mt-2">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-center m-1">{{$title}} </h3>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <h4 style="background-color: #FFFF00" class="text-center p-1 d-flex align-items-center justify-content-center border border-secondary">
                <img src="{{ asset('assets/images/partai/partai_golongan_karya.png') }}" class="avatar-xs float-left" alt="">
                <span class="mx-auto">Partai Golongan Karya</span>
            </h4>
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-md-6 col-lg">
                            <h4 style="background-color: #FFFF00" class="text-center p-1 d-flex align-items-center justify-content-center border border-secondary">
                                <span class="mx-auto">Dapil 1</span>
                            </h4>
                            <div class="mt-2">
                                <div wire:ignore>
                                    <table id="myTable1" 
                                        class="table table-bordered table-striped text-dark" 
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 16px">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" width="10">NO</th>
                                            <th class="text-center">NAMA CALON</th>
                                            <th class="text-center" width="50">#</th>
                                        </tr>
            
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg">
                            <h4 style="background-color: #FFFF00" class="text-center p-1 d-flex align-items-center justify-content-center border border-secondary">
                                <span class="mx-auto">Dapil 2</span>
                            </h4>
                            <div class="mt-2">
                                <div wire:ignore>
                                    <table id="myTable2" 
                                        class="table table-bordered table-striped text-dark" 
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 16px">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" width="10">NO</th>
                                            <th class="text-center">NAMA CALON</th>
                                            <th class="text-center" width="50">#</th>
                                        </tr>
            
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg">
                            <h4 style="background-color: #FFFF00" class="text-center p-1 d-flex align-items-center justify-content-center border border-secondary">
                                <span class="mx-auto">Dapil 3</span>
                            </h4>
                            <div class="mt-2">
                                <div wire:ignore>
                                    <table id="myTable3" 
                                        class="table table-bordered table-striped text-dark" 
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 16px">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" width="10">NO</th>
                                            <th class="text-center">NAMA CALON</th>
                                            <th class="text-center" width="50">#</th>
                                        </tr>
            
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg">
                            <h4 style="background-color: #FFFF00" class="text-center p-1 d-flex align-items-center justify-content-center border border-secondary">
                                <span class="mx-auto">Dapil 4</span>
                            </h4>
                            <div class="mt-2">
                                <div wire:ignore>
                                    <table id="myTable4" 
                                        class="table table-bordered table-striped text-dark" 
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 16px">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" width="10">NO</th>
                                            <th class="text-center">NAMA CALON</th>
                                            <th class="text-center" width="50">#</th>
                                        </tr>
            
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="col">
            <h4 class="text-center p-0 bg-white d-flex align-items-center justify-content-center border border-secondary">
                <img src="{{ asset('assets/images/partai/partai_golongan_karya.png') }}" class="avatar-sm float-left invisible" alt="">
                <span class="mx-auto">Partai Lainnya</span>
            </h4>
            <div class="card">
                <div class="card-body">

                    <div class="mt-2">
                        <div wire:ignore>
                            <table id="myTable2" 
                                class="table table-bordered table-striped text-dark" 
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 16px">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="10"></th>
                                    <th class="text-center">NAMA PARTAI</th>
                                    <th class="text-center">TOTAL SUARA</th>
                                </tr>
    
                                </thead>
    
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('mods.rekap.act.rekap_dapil_atc')
</div>