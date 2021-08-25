<div class="row grid-container" data-layout="masonry" style="overflow: visible">
    @php
    $count = DB::table('merchants')->where('user_id', Auth::user()->id)->count();
    @endphp
    @if ($count > 0)
        @foreach($merchant as $item)
            <div class="col-lg-6 mb-2">
                <div class="flip-card top-to-bottom mb-2">
                    <div class="flip-card-front dark" data-height-xl="200" style="background-image: url('{{$item->takeImage}}');">
                        <div class="flip-card-inner">
                            <div class="card bg-transparent border-0">
                                <div class="card-body">
                                    <h3 class="card-title mb-0">{{$item->nama}}</h3>
                                    <span class="font-italic">{{$item->alamat}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flip-card-back bg-warning no-after" data-height-xl="200">
                        <div class="flip-card-inner">
                            <h3 class="card-title mb-0">{{$item->nama}}</h3>
                            <p class="mb-2 text-white">Jam Operasional {{$item->buka}} - {{$item->tutup}}</p>
                            <p class="mb-2 text-white">{{$item->deskripsi}}</p>
                            <a href="{{$item->owner->username}}" class="btn btn-outline-light mt-2">Lihat selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
    
        @foreach ($merchant as $item)
        <div class="col-lg-6 mb-2">
            <div class="flip-card top-to-bottom mb-2">
                <div class="flip-card-front dark" data-height-xl="200" style="background-image: url('{{$item->takeImage}}');">
                    <div class="flip-card-inner">
                        <div class="card bg-transparent border-0">
                            <div class="card-body">
                                <h3 class="card-title mb-0">{{$item->nama}}</h3>
                                <span class="font-italic">{{$item->alamat}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flip-card-back bg-warning no-after" data-height-xl="200">
                    <div class="flip-card-inner">
                        <h3 class="card-title mb-0">{{$item->nama}}</h3>
                        <p class="mb-2 text-white">Jam Operasional {{$item->buka}} - {{$item->tutup}}</p>
                        <p class="mb-2 text-white">{{$item->deskripsi}}</p>
                        <a href="{{$item->owner->username}}" class="btn btn-outline-light mt-2">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    
    <!-- <div class="col-lg-6 mb-4">
        <div class="flip-card text-center">
            <div class="flip-card-front dark" data-height-xl="505" style="background-image: url('images/shop.jpg');">
                <div class="flip-card-inner">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <img src="{{asset('images/black.png')}}" style="width:30%;margin-left:350px;">
                            <div class="heading-block">
                                <h4>Apakah anda pemilik umkm ?</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flip-card-back" data-height-xl="505" style="background-image: url('images/shop.jpg');">
                <div class="flip-card-inner">
                    <p class="mb-2 text-white">Anda memiliki usaha umkm dikawasan Laguboti dan ingin mempromosikan usaha anda ?</p><p> Daftarkan usaha anda sekarang</p>
                    <a href="javascript:void(0);" onclick="open_modal('#ModalCreateMerchant');" class="btn btn-outline-light mt-2">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </div> -->
@endif
</div>
{{$merchant->links()}}