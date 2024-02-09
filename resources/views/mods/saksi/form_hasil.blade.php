<div>
    <div class="row mb-5">
        <div class="col">

            @push('push-script')
                <script>
                    $('.angka').on('input', function() {
                        var value = $(this).val();
                        // Memastikan bahwa nilai yang dimasukkan adalah angka dan lebih besar dari 0
                        if ($.isNumeric(value) && parseFloat(value) > 0) {
                            // Jika valid, biarkan input tetap seperti itu
                        } else {
                            // Jika tidak valid, hapus karakter terakhir dari input
                            $(this).val(value.slice(0, -1));
                        }
                    });
                </script>
            @endpush    


                @foreach ($list_partai as $key => $item)
                    @if ($item['id'] == 8)

                        <div>
                            <h5>
                                @php
                                    $img = asset('assets/images/partai/' . $item['logo']);
                                @endphp
                                <img src="{{$img}}" width="30" alt="" class="rounded avatar-sm">
                                {{$item['nama_partai']}}
                            </h5>
                        </div>
                        @foreach ($item['rekaps'] as $key2 => $item2)
                            <div class="my-2">
                                <strong>{{$item2['calons']['no_urut']}}. {{$item2['calons']['nama']}}</strong>
                                <div class="input-group">
                                    <span class="input-group-btn input-group-prepend">
                                        <button wire:click="onMinus({{$key}},{{$key2}},{{$item2['id']}})" class="btn btn-primary" type="button">-</button>
                                    </span>
                                    <input data-toggle="touchspin" type="text" wire:model.live="list_partai.{{intval($key)}}.rekaps.{{intval($key2)}}.jumlah" class="form-control angka">
                                    <span class="input-group-btn input-group-append">
                                        <button wire:click="onPlus({{$key}},{{$key2}},{{$item2['id']}})" class="btn btn-primary" type="button">+</button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        
                    @endif
                
                @endforeach

                @foreach ($list_partai as $key => $item)
                    @if ($item['id'] != 8)
                        <hr>
                        <div>
                            <h5>
                                @php
                                    $img = asset('assets/images/partai/' . $item['logo']);
                                @endphp
                                <img src="{{$img}}" width="30" alt="" class="rounded avatar-sm">
                                {{$item['nama_partai']}}
                            </h5>
                        </div>
                        @foreach ($item['rekaps'] as $key2 => $item2)
                            <div class="my-2">
                                <strong>{{$item2['calons']['no_urut']}}. {{$item2['calons']['nama']}}</strong>
                                <div class="input-group">
                                    <span class="input-group-btn input-group-prepend">
                                        <button wire:click="onMinus({{$key}},{{$key2}},{{$item2['id']}})" class="btn btn-primary" type="button">-</button>
                                    </span>
                                    <input data-toggle="touchspin" type="text" wire:model="list_partai.{{intval($key)}}.rekaps.{{intval($key2)}}.jumlah" class="form-control angka">
                                    <span class="input-group-btn input-group-append">
                                        <button wire:click="onPlus({{$key}},{{$key2}},{{$item2['id']}})" class="btn btn-primary" type="button">+</button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        
                    @endif
                
                @endforeach
                
            

        </div>
    </div>
</div>