<br>
<div id="shop" class="shop row grid-container gutter-30 mb-5" data-layout="fitRows">
    @foreach($produk as $item)
    <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="grid-inner">
            <div class="product-image">
                <a href="javascript:void(0);"><img src="{{$item->takeImage}}" height="250px" alt="{{$item->nama}}"></a>
                <div class="sale-flash badge badge-success p-2">Dijual</div>
                <div class="bg-overlay">
                    <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                        <a href="javascript:void(0);" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
                        <a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                    </div>
                    <div class="bg-overlay-bg bg-transparent"></div>
                </div>
            </div>
            <div class="product-desc">
                <div class="product-title"><h3><a href="javascript:void(0);">{{$item->nama}}</a></h3></div>
                <div class="product-price"><ins>Rp. {{number_format($item->harga)}}</ins></div>
                <div class="product-description">
                    <!-- <span style="float:left;">{{$item->jenis}}</span> -->
                    @if (Auth::user()->id == $merchant->user_id)
                    <a onclick="handle_delete('{{$item->id}}','product/{{$item->id}}/delete');" href="javascript:void(0);" style="color:red;float:right;" class="ml-2"><i class="icon-line-trash"></i></a>
                    <a onclick="handle_open_modal('{{$item->id}}','product/{{$item->id}}/edit','#MUbahProduk','#contentUbahProduk');" href="javascript:void(0);" style="color:yellowgreen;float:right;"><i class="icon-line-edit"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{$produk->links()}}