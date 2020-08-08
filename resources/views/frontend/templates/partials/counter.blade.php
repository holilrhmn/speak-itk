<section class="counter">
    <div class="content">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="count-item decoration-bottom">
                        <h3>Jumlah Laporan Sekarang</h3>
                        <strong>{{ $jumlah_laporan }}</strong>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="count-item decoration-bottom">
                        
                        <h3>Jumlah Laporan Terselesaikan</h3>
                        <strong>{{ $laporan_selesai }}</strong>
                    </div>
                </div> --}}
                <div class="col-sm-6 mt-3 mb-3">
                    <div class="count-item decoration-bottom">
                    <div class="cards-list">
                            <div class="card 1">
                                <div class="card_title title-white">
                                <p>Card Title</p>
                                </div>
                                <h1>Jumlah Laporan<h1>
                                <strong>{{$jumlah_laporan}}</strong>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-6 mt-3 mb-3">
                    <div class="count-item decoration-bottom">
                        <div class="cards-list">
                            <div class="card 2">
                                {{-- <div class="card_image">
                                    <img src="https://cdn.blackmilkclothing.com/media/wysiwyg/Wallpapers/PhoneWallpapers_FloralCoral.jpg" />
                                </div> --}}
                                <div class="card_title title-white">
                                    <p>Card Title</p>
                                </div>
                                <h1>Laporan Selesai<h1>
                                <strong>{{$laporan_selesai }}</strong>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
</section>
