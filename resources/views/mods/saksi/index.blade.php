@extends('components.layouts.app', ["data" => $data])

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">{{$data['title']}}</h4>

            {{-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{$data['title']}}</li>
                </ol>
            </div> --}}

        </div>

    </div>
</div>


<div class="row">
    <div class="col">
        @if ($data['page'] == 'hasil')
            @livewire('saksi.form-hasil')
        {{-- @elseif ($data['page'] == 'dashboard_saksi') --}}
        
        @endif
    </div>
</div>

@endsection