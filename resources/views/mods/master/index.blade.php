@extends('components.layouts.app', ['data' => $data])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">{{ $data['title'] }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                    </ol>
                </div>

            </div>

        </div>
    </div>


    <div class="row">
        <div class="col">
            @if ($data['page'] == 'partai_data')
                @livewire('master.partai')
            @elseif ($data['page'] == 'calon_data')
                @livewire('master.calon-data')
            @elseif ($data['page'] == 'tps_data')
                @livewire('master.tps')
            @elseif ($data['page'] == 'kecamatan_data')
                @livewire('master.kecamatan')
            @elseif ($data['page'] == 'kelurahan_data')
                @livewire('master.kelurahan')
            @elseif ($data['page'] == 'dapil_data')
                @livewire('master.dapil')
            @endif
        </div>
    </div>
@endsection
