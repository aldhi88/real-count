@extends('components.layouts.rekap', ["data" => $data])

@section('content')

{{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">{{$data['title']}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{$data['title']}}</li>
                </ol>
            </div>

        </div>

    </div>
</div> --}}


<div class="row">
    <div class="col">
        @if ($data['page'] == 'rekap_per_dapil')
            @livewire('rekap.rekap-per-dapil',['data' => $data])
        @elseif ($data['page'] == 'rekap_dapil')
        @livewire('rekap.rekap-dapil',['data' => $data])
        @endif
    </div>
</div>

@endsection