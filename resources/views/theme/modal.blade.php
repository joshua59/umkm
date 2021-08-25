<div id="ModalCreateMerchant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CreateMerchantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="CreateMerchantLabel">Daftarkan usaha anda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form_create_merchant">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nama_merchant">Nama Usaha</label>
                                <input type="text" class="form-control" id="nama_merchant" name="nama" placeholder="Nama Usaha">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jenis_merchant">Jenis Usaha</label>
                                <select id="jenis_merchant" name="jenis" class="form-control">
                                    <option disabled selected>Pilih jenis usaha</option>
                                    <option value="Kuliner">Kuliner</option>
                                    <option value="Sembako">Sembako</option>
                                    <option value="Perabot">Perabot</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Bahan bangunan">Bahan bangunan</option>
                                    <option value="Perhiasan">Perhiasan</option>
                                    <option value="Kendaraan">Kendaraan</option>
                                    <option value="Warung kecil">Warung kecil</option>
                                    <option value="Toserba">Toserba/Swalayan</option>
                                    <option value="Mainan">Mainan</option>
                                    <option value="Jasa">Jasa</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>&nbsp;</label>
                                <input type="text" class="form-control" id="buka_merchant" name="buka" placeholder="Jam Buka" maxlength="5">
                            </div>
                            <div class="form-group col-md-2">
                                <label>&nbsp;</label>
                                <input type="text" class="form-control" id="tutup_merchant" name="tutup" placeholder="Jam Tutup" maxlength="5">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="alamat_merchant">Alamat (akhiri dengan Laguboti)</label>
                                <textarea class="form-control" id="alamat_merchant" name="alamat" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="deskripsi_merchant">Deskripsi usaha</label>
                                <textarea class="form-control" id="deskripsi_merchant" name="deskripsi" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_merchant">Logo/Foto Usaha</label>
                            <input type="file" class="form-control" id="gambar_merchant" name="gambar">
                        </div>
                        <button id="tombol_kirim_merchant" onclick="upload_form_modal('#tombol_kirim_merchant','#form_create_merchant','{{route('merchant_store')}}','#ModalCreateMerchant');" class="btn btn-primary">Daftarkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="CreateProdukMerchant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CreateProdukMerchantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="CreateProdukMerchantLabel">Tambahkan Produk anda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form_create_produk">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama" placeholder="Nama Produk">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jenis_produk">Jenis produk</label>
                                <select id="jenis_produk" name="jenis" class="form-control">
                                    <option disabled selected>Pilih jenis produk</option>
                                    <option value="Kuliner">Kuliner</option>
                                    <option value="Sembako">Sembako</option>
                                    <option value="Perabot">Perabot</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Bahan bangunan">Bahan bangunan</option>
                                    <option value="Perhiasan">Perhiasan</option>
                                    <option value="Kendaraan">Kendaraan</option>
                                    <option value="Jajanan">Jajanan</option>
                                    <option value="Aksesoris">Aksesoris</option>
                                    <option value="Mainan">Mainan</option>
                                    <option value="Jasa">Jasa</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Harga</label>
                                <input type="text" class="form-control" id="harga_produk" name="harga" placeholder="Harga Produk" maxlength="15">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_produk">Gambar produk</label>
                            <input type="file" class="form-control" id="gambar_produk" name="gambar">
                        </div>
                        <button id="tombol_kirim_produk" onclick="upload_form_modal('#tombol_kirim_produk','#form_create_produk','{{route('product_store')}}','#CreateProdukMerchant');" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="form_update_product">
    <div class="modal fade" id="MUbahProduk" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="contentUbahProduk">
            </div>
        </div>
    </div>
</form>
<form id="form_update_merchant">
    <div class="modal fade" id="MUbahMerchant" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="contentUbahMerchant">
            </div>
        </div>
    </div>
</form>
@section('custom_js')
    <script>
        jam('buka_merchant');
        jam('tutup_merchant');
        number_only('harga_produk');
        ribuan('harga_produk');
    </script>
@endsection