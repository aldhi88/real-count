<div>
    <div class="row">
        <div class="col-6">

            <form wire:submit="importData">
            <div class="form-group">
                <h6>Upload Data Kelurahan</h6>
                <input type="file" wire:model="file_import" class="form-control @error('file_import') is-invalid @enderror">
                @error('file_import')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary">Upload Data</button>
            </form>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="dt-responsive table-responsive mt-2">
                        <div wire:ignore>
                        <table id="myTable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-center" width="10"></th>
                                <th class="text-center">Kecamatan</th>
                                <th class="text-center">Keluarahan</th>
                            </tr>

                            </thead>

                            <thead id="header-filter">
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center"><input type="text" class="form-control form-control-sm text-center search-col-dt"></th>
                                    <th class="text-center"><input type="text" class="form-control form-control-sm text-center search-col-dt"></th>
                                </tr>
                            </thead>


                            <tbody>

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('mods.master.atc.kelurahan_data_atc')
</div>

