<div>
    <div class="row mt-2">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-center m-1">{{$title}} </h3>
                <select id="mySelect">
                    <optgroup label="Pilih Dapil">
                        @foreach ($dapil as $item)
                        <option {{$dapilId==$item['id']?'selected':null}} value="{{route('rekap.rekapPerDapil', $item['id'])}}">{{$item['no_dapil']}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4 style="background-color: #FFFF00" class="text-center p-1 d-flex align-items-center justify-content-center border border-secondary">
                <img src="{{ asset('assets/images/partai/partai_golongan_karya.png') }}" class="avatar-xs float-left" alt="">
                <span class="mx-auto">Partai Golongan Karya</span>
            </h4>
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
            <h4 class="text-center p-0 bg-white d-flex align-items-center justify-content-center border border-secondary">
                <img src="{{ asset('assets/images/partai/partai_golongan_karya.png') }}" class="avatar-sm float-left invisible" alt="">
                <span class="mx-auto">Partai Lainnya</span>
            </h4>
            <div class="card">
                <div class="card-body">

                    <div class="dt-responsive table-responsive mt-2">
                        <div wire:ignore>
                            <table id="myTable2" 
                                class="table table-bordered table-striped dt-responsive nowrap text-dark" 
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 22px">
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
    </div>

    @include('mods.rekap.act.rekap_per_dapil_atc')
</div>