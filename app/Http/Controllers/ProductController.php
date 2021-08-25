<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'nama' => 'required',
                'jenis' => 'required',
                'harga' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
        try {
            $merchant = Merchant::where('user_id', Auth::user()->id)->first();
            $gambar = request()->file('gambar')->store("produk");
            $produk = new Product;
            $produk->merchant_id = $merchant->id;
            $produk->nama = $request->nama;
            $produk->slug = Str::slug($request->nama);
            $produk->jenis = $request->jenis;
            $produk->harga = str_replace(',','',$request->harga);
            $produk->gambar = $gambar;
            $produk->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Produk '. $request->nama . ' telah ditambahkan',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="CreateProdukMerchantLabel">Edit Produk <?=$product->nama;?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="u_nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="u_nama_produk" name="nama" placeholder="Nama Produk" value="<?=$product->nama;?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jenis_produk">Jenis produk</label>
                        <select id="u_jenis_produk" name="jenis" class="form-control">
                                <option disabled selected>Pilih jenis produk</option>
                                <option value="Kuliner" <?= ($product->jenis == "Kuliner" ? 'selected="selected"' : '') ?>>Kuliner</option>
                                <option value="Sembako" <?= ($product->jenis == "Sembako" ? 'selected="selected"' : '') ?>>Sembako</option>
                                <option value="Perabot" <?= ($product->jenis == "Perabot" ? 'selected="selected"' : '') ?>>Perabot</option>
                                <option value="Elektronik" <?= ($product->jenis == "Elektronik" ? 'selected="selected"' : '') ?>>Elektronik</option>
                                <option value="Pakaian" <?= ($product->jenis == "Pakaian" ? 'selected="selected"' : '') ?>>Pakaian</option>
                                <option value="Bahan bangunan" <?= ($product->jenis == "Bahan bangunan" ? 'selected="selected"' : '') ?>>Bahan bangunan</option>
                                <option value="Perhiasan" <?= ($product->jenis == "Perhiasan" ? 'selected="selected"' : '') ?>>Perhiasan</option>
                                <option value="Kendaraan" <?= ($product->jenis == "Kendaraan" ? 'selected="selected"' : '') ?>>Kendaraan</option>
                                <option value="Jajanan" <?= ($product->jenis == "Jajanan" ? 'selected="selected"' : '') ?>>Jajanan</option>
                                <option value="Aksesoris" <?= ($product->jenis == "Aksesoris" ? 'selected="selected"' : '') ?>>Aksesoris</option>
                                <option value="Mainan" <?= ($product->jenis == "Mainan" ? 'selected="selected"' : '') ?>>Mainan</option>
                                <option value="Jasa" <?= ($product->jenis == "Jasa" ? 'selected="selected"' : '') ?>>Jasa</option>
                                <option value="Lainnya" <?= ($product->jenis == "Lainnya" ? 'selected="selected"' : '') ?>>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Harga</label>
                        <input type="text" class="form-control" id="u_harga_produk" name="harga" placeholder="Harga Produk" maxlength="15" value="<?=number_format($product->harga);?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gambar_produk">Logo</label>
                    <input type="file" class="form-control" id="u_gambar_produk" name="gambar">
                </div>
                <button id="tombol_update_produk" onclick="upload_form_modal('#tombol_update_produk','#form_update_product','product/<?=$product->id;?>/update','#MUbahProduk');" class="btn btn-primary">Update</button>
            </div>
        </div>
        <?
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            if(request()->file('gambar')){
                Storage::delete($product->gambar);
                $gambar = request()->file('gambar')->store("produk");
                $product->gambar = $gambar;
            }
            $product->nama = $request->nama;
            $product->jenis = $request->jenis;
            $product->harga = str_replace(',','',$request->harga);

            $product->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Produk '. $request->nama . ' telah di Update',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            Storage::delete($product->gambar);
            $product->delete();
            return response()->json([
                'alert' => 'success',
                'message' => 'Produk '. $product->nama . ' Dihapus',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
}
