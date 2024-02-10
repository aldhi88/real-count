<div>
    <div class="row mb-5">
        <div class="col">

            @push('push-script')
                <script>
                $('.angka').on('keydown', function(e) {
                    var key = e.keyCode || e.which;
                    if ((key == 8 || key == 46) && $(this).val().length === 0) {
                        e.preventDefault();
                    }
                    if ((key < 48 || key > 57) && key != 8 && key != 9) {
                        e.preventDefault();
                    }
                    var value = $(this).val();
                    if (value.length > 1 && value.charAt(0) === '0') {
                        $(this).val(parseInt(value, 10));
                    }
                });
                </script>
            @endpush    


                @foreach ($list_partai as $key => $item)
                    @if ($item['id'] == 8)

                        <div class="text-center">
                            <h5>
                                @php
                                    $img = asset('assets/images/partai/' . $item['logo']);
                                @endphp
                                <img src="{{$img}}" alt="" class="rounded avatar-xs"> <br>
                                {{$item['nama_partai']}}
                            </h5>
                        </div>
                        <hr class="my-0">
                        @foreach ($item['rekaps'] as $key2 => $item2)
                            <div class="my-2">
                                <strong class="text-dark">{{$item2['calons']['no_urut']}}. {{$item2['calons']['nama']}}</strong>
                                <div class="input-group">
                                    <span class="input-group-btn input-group-prepend">
                                        <button wire:click="onMinus({{$key}},{{$key2}},{{$item2['id']}})" class="btn btn-primary px-4" type="button">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </span>
                                    <input style="font-size: 18px; font-weight: bold" 
                                        type="text" wire:model.live="list_partai.{{intval($key)}}.rekaps.{{intval($key2)}}.jumlah" 
                                        class="form-control angka text-center">
                                    <span class="input-group-btn input-group-append">
                                        <button wire:click="onPlus({{$key}},{{$key2}},{{$item2['id']}})" class="btn btn-primary px-4" type="button">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        
                    @endif
                
                @endforeach

                @foreach ($list_partai as $key => $item)
                    @if ($item['id'] != 8)
                        <hr>
                        <div class="text-center">
                            <h5>
                                @php
                                    $img = asset('assets/images/partai/' . $item['logo']);
                                @endphp
                                <img src="{{$img}}" alt="" class="rounded avatar-xs"> <br>
                                {{$item['nama_partai']}}
                            </h5>
                        </div>
                        <hr class="my-0">
                        @foreach ($item['rekaps'] as $key2 => $item2)
                            @if ($key2==0)

                                <div class="my-2">
                                    {{-- <strong class="text-dark">{{$item2['calons']['no_urut']}}. {{$item2['calons']['nama']}}</strong> --}}
                                    <div class="input-group">
                                        <span class="input-group-btn input-group-prepend">
                                            <button wire:click="onMinus({{$key}},{{$key2}},{{$item2['id']}})" class="btn btn-primary px-4" type="button">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                        <input style="font-size: 18px; font-weight: bold" 
                                        type="text" wire:model.live="list_partai.{{intval($key)}}.rekaps.{{intval($key2)}}.jumlah" 
                                        class="form-control angka text-center">
                                        <span class="input-group-btn input-group-append">
                                            <button wire:click="onPlus({{$key}},{{$key2}},{{$item2['id']}})" class="btn btn-primary px-4" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                
                            @endif
                        @endforeach
                        
                    @endif
                
                @endforeach
                
            

        </div>
    </div>
</div>