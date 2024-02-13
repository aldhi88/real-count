<div>
    <div class="text-center">
        <div>
            <a href="javascript:void(0)" class="logo"><img src="{{ asset('assets/images/partai/partai_golongan_karya.png') }}" height="80" alt="logo"></a>
        </div>
    
        <h4 class="font-size-18 mt-1 mb-0">Selamat Datang</h4>
        <p class="text-muted">Silahkan login ke Aplikasi {{config('app.name')}}</p>
    </div>
    
    <div class="p-2 mt-2">
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        
        <form class="form-horizontal" wire:submit="login">

            {{-- <div class="form-group auth-form-group-custom mb-1">
                <i class="text-warning ri-shield-user-line auti-custom-input-icon"></i>
                <label for="userpassword">Login Sebagai</label>
                <select wire:model.lazy="as" class="form-control">
                    <option value="0">Pilih anda login sebagai apa..</option>
                    @foreach ($dt_roles as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div> --}}

            {{-- @if ($as != 0 && $as!=='Partai')
                <div class="form-group auth-form-group-custom mb-1">
                    <i class="text-warning ri-building-line auti-custom-input-icon"></i>
                    <label for="userpassword">Dapil</label>
                    <select wire:change="pickDapil" wire:model="dapil_id" class="form-control">
                        <option value="0">Pilih anda login sebagai apa..</option>
                        @foreach ($dt_dapil as $item)
                            <option value="{{$item['id']}}">{{$item['no_dapil']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group auth-form-group-custom mb-1">
                    <i class="text-warning ri-community-line auti-custom-input-icon"></i>
                    <label for="userpassword">Kecamatan</label>
                    <select class="form-control" wire:change="pickKecamatan" wire:model="kecamatan_id">
                        <option value="0">Pilih data kecamatan..</option>
                        @foreach ($dt_kecamatan as $item)
                            <option value="{{$item['id']}}">{{$item['nama_kecamatan']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group auth-form-group-custom mb-1">
                    <i class="text-warning ri-store-line auti-custom-input-icon"></i>
                    <label for="userpassword">Kelurahan</label>
                    <select class="form-control" wire:change="pickKelurahan" wire:model="kelurahan_id">
                        <option value="0">Pilih data kelurahan..</option>
                        @foreach ($dt_kelurahan as $item)
                            <option value="{{$item['id']}}">{{$item['nama_kelurahan']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group auth-form-group-custom mb-1">
                    <i class="text-warning ri-store-line auti-custom-input-icon"></i>
                    <label for="userpassword">No. TPS</label>
                    <select class="form-control" wire:change="pickTps" wire:model="tps_id">
                        <option value="0">Pilih nomor TPS..</option>
                        @foreach ($dt_tps as $item)
                            <option value="{{$item['id']}}">{{$item['no_tps']}}</option>
                        @endforeach
                    </select>
                </div>
            @endif --}}

            <hr>
    
            <div class="form-group auth-form-group-custom">
                <i class="text-warning ri-user-2-line auti-custom-input-icon"></i>
                <label for="username">ID Pengguna</label>
                <input wire:model="username" autofocus type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Ketik ID login anda..">
                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
    
            <div class="form-group auth-form-group-custom">
                <i class="text-warning ri-lock-2-line auti-custom-input-icon"></i>
                <label for="userpassword">Kata Sandi</label>
                <input wire:model="password" type="text" class="form-control @error('password') is-invalid @enderror" placeholder="Ketik kata sandi anda..">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror

            </div>
    
            
    
            {{-- <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
                <label class="custom-control-label" for="customControlInline">Remember me</label>
            </div> --}}
    
            <div class="mt-4 text-center">
                <button class="btn btn-warning w-md waves-effect waves-light btn-block btn-lg" type="submit">Masuk</button>
            </div>
    
            {{-- <div class="mt-3 text-center">
                <a href="{{ route('auth.forgot') }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Lupa kata sandi?</a>
            </div> --}}
        </form>
    </div>
    
    {{-- <div class="mt-3 text-center">
        <p>Anda mitra dan belum memiliki akun ? <a href="{{ route('auth.register') }}" class="font-weight-medium text-primary"> Daftar </a> </p>
        <p>© 2023 Veripro. Hak Cipta oleh Telkom Akses Medan</p>

    </div> --}}
</div>