@extends('theme.main',["title" => "Nama Toko"])
@section('content')


<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row align-items-stretch col-mb-50">
                <div class="col-lg-6">
                    <div class="row col-mb-50 mb-0">
                        <div class="col-6">
                            <img src="{{$merchant->takeImage}}">
                        </div>
                        <!-- Contact Info ============================================= -->
                        <div class="col-md-6">
                            <address>
                                <strong>{{$merchant->nama}}</strong><br>
                                {{$merchant->alamat}}
                            </address>
                            <abbr title="Deskripsi"><strong></strong></abbr> {{$merchant->deskripsi}}<br><br>
                            <abbr title="Phone Number"><strong>Kontak:</strong></abbr> +{{$merchant->owner->phone}}<br>
                            <!-- <abbr title="Email Address"><strong>Email:</strong></abbr> {{$merchant->owner->email}}<br> -->
                            <abbr title="Jam Operasional"><strong>Jam operasional:</strong></abbr> {{$merchant->buka}} - {{$merchant->tutup}} WIB
                        </div>
                        <!-- Contact Info End -->
                    </div>
                    <div class="row">
                        @if (Auth::user()->id == $merchant->user_id)
                        <div class="col-6">
                            <a href="javascript:void(0);" onclick="handle_open_modal('{{$merchant->id}}','merchant/{{$merchant->id}}/edit','#MUbahMerchant','#contentUbahMerchant');" class="button button-3d m-0 btn-block button-xlarge d-none d-md-block center">Edit Profil Toko</a>
                        </div>
                        <div class="col-6">
                            <a href="https://wa.me/{{$merchant->owner->phone}}" target="_blank" class="button button-3d m-0 btn-block button-xlarge d-none d-md-block center">Chat Penjual</a>
                        </div>
                        @else
                        <div class="col-12">
                            <a href="https://wa.me/{{$merchant->owner->phone}}" target="_blank" class="button button-3d m-0 btn-block button-xlarge d-none d-md-block center">Chat Penjual</a>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- Google Map ============================================= -->
                <div class="col-lg-6 min-vh-50">
                    <section class="gmap h-100"
                    data-address="{{$merchant->alamat}}"
                    data-markers='[{address: "{{$merchant->alamat}}", html: "<div class=\"p-2\" style=\"width: 300px;\"><h4 class=\"mb-2\">Hi! We are <span>{{$merchant->nama}}!</span></h4><p class=\"mb-0\" style=\"font-size:1rem;\">{{$merchant->bio}}</p></div>", icon:{ image: "{{asset('semicolon/images/icons/map-icon-red.png')}}", iconsize: [32, 39], iconanchor: [32,39] } }]'></section>
                </div>
                <!-- Google Map End -->
            </div>
            @if (Auth::user()->id == $merchant->user_id)
                <a href="javascript:void(0);" onclick="open_modal('#CreateProdukMerchant');" class="button mt-5 mb-5 button-small tright fright">Tambah Produk</a>
            @endif
            <div id="content_list">
                <div id="list_result"></div>
            </div>
            <div class="row align-items-stretch mt-5 col-mb-50">
                <ol class="commentlist border-0 m-0 p-0 clearfix">
                    @foreach ($comment as $item)
                    <li class="comment even thread-even depth-1" id="li-comment-{{$item->id}}">
                        <div id="comment-{{$item->id}}" class="comment-wrap clearfix" style="width:1000px;">
                            <div class="comment-meta">
                                <div class="comment-author vcard">
                                    <span class="comment-avatar clearfix">
                                    <img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>
                                </div>
                            </div>
                            <div class="comment-content clearfix">
                                <div class="comment-author">
                                    {{$item->user->username}}
                                    <span>
                                        <a href="#" title="Permalink to this comment">
                                            {{$item->created_at->diffForHumans()}}
                                        </a>
                                    </span>
                                </div>
                                <p>{{$item->comment}}</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </li>
                    @endforeach
                </ol>
            </div>
            <form id="form_create_komentar" class="mt-lg-6">
                <div class="form-group col-md-12">
                    <input type="hidden" name="merchant_id" value="{{$merchant->id}}">
                    <label for="komentar_merchant">Komentar</label>
                    <textarea class="form-control" id="komentar_merchant" name="komentar" placeholder="Komentar"></textarea>
                </div>
                <button id="tombol_kirim_komentar" onclick="save_form('#tombol_kirim_komentar','#form_create_komentar','{{route('komentar_store')}}');" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</section>
@endsection
@section('custom_js')
    <script>
        load_list(1);
    </script>
@endsection