<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.index')}}">
                            <i class="ri-dashboard-line mr-2"></i> Dashboard
                        </a>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-pencil-ruler-2-line mr-2"></i>UI Elements <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                            aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-alerts.html" class="dropdown-item">Alerts</a>
                                        <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                        <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                        <a href="ui-carousel.html" class="dropdown-item">Carousel</a>
                                        <a href="ui-dropdowns.html" class="dropdown-item">Dropdowns</a>
                                        <a href="ui-grid.html" class="dropdown-item">Grid</a>
                                        <a href="ui-images.html" class="dropdown-item">Images</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-lightbox.html" class="dropdown-item">Lightbox</a>
                                        <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                        <a href="ui-rangeslider.html" class="dropdown-item">Range Slider</a>
                                        <a href="ui-roundslider.html" class="dropdown-item">Round slider</a>
                                        <a href="ui-session-timeout.html" class="dropdown-item">Session Timeout</a>
                                        <a href="ui-progressbars.html" class="dropdown-item">Progress Bars</a>
                                        <a href="ui-sweet-alert.html" class="dropdown-item">Sweet-Alert</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-tabs-accordions.html" class="dropdown-item">Tabs & Accordions</a>
                                        <a href="ui-typography.html" class="dropdown-item">Typography</a>
                                        <a href="ui-video.html" class="dropdown-item">Video</a>
                                        <a href="ui-general.html" class="dropdown-item">General</a>
                                        <a href="ui-rating.html" class="dropdown-item">Rating</a>
                                        <a href="ui-notifications.html" class="dropdown-item">Notifications</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li> --}}

                    @if (Auth::id() != 1 && Auth::id() != 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('saksi.formHasil')}}">
                            <i class="ri-dashboard-line mr-2"></i> Form Hasil Suara
                        </a>
                    </li>
                    @endif

                    @if (Auth::id() == 1 || Auth::id() == 2)
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-layout-3-line mr-2"></i>Master <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                            <a href="{{ route('master.partaiData') }}" class="dropdown-item">Partai</a>
                            <a href="{{ route('master.dapilData') }}" class="dropdown-item">Dapil</a>
                            <a href="{{ route('master.kecamatanData') }}" class="dropdown-item">Kecamatan</a>
                            <a href="{{ route('master.kelurahanData') }}" class="dropdown-item">Kelurahan</a>
                            <a href="{{ route('master.tpsData') }}" class="dropdown-item">TPS</a>
                            <a href="{{ route('master.calonData') }}" class="dropdown-item">Calon</a>
                            <a href="{{ route('master.saksiData') }}" class="dropdown-item">Saksi</a>
                        </div>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-layout-3-line mr-2"></i>Rekap <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                            <a href="{{ route('rekap.rekapPerDapil') }}" class="dropdown-item">Rekap per Dapil</a>
                        </div>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-record-vinyl mr-2 text-danger fa-fw"></i>Live Rekap <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-more">
                            <a target="_balnk"  href="{{route('rekap.rekapPerDapil',1)}}" class="dropdown-item">Rekap Per Dapil</a>
                            <a target="_balnk"  href="{{route('rekap.rekapDapil')}}" class="dropdown-item">Rekap Semua Dapil</a>
                        </div>
                    </li>

                    @endif


                </ul>
            </div>
        </nav>
    </div>
</div>
