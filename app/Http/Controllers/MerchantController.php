<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MerchantController extends Controller
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
                'alamat' => 'required',
                'deskripsi' => 'required',
                'buka' => 'required|min:5|max:5',
                'tutup' => 'required|min:5|max:5',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
        try {
            $gambar = request()->file('gambar')->store("merchant");
            $merchant = new Merchant;
            $merchant->user_id = Auth::user()->id;
            $merchant->nama = $request->nama;
            $merchant->jenis = $request->jenis;
            $merchant->alamat = $request->alamat;
            $merchant->deskripsi = $request->deskripsi;
            $merchant->buka = $request->buka;
            $merchant->tutup = $request->tutup;
            $merchant->gambar = $gambar;
            $merchant->save();
            return response()->json([
                'alert' => 'success',
                'message' =>  $request->nama. ' telah didaftarkan',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="CreateMerchantLabel">Edit usaha anda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form_create_merchant">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="u_nama_merchant">Nama Usaha</label>
                            <input type="text" class="form-control" id="u_nama_merchant" name="nama" value="<?=$merchant->nama;?>" placeholder="Nama Usaha">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="u_jenis_merchant">Jenis Usaha</label>
                            <select id="u_jenis_merchant" name="jenis" class="form-control">
                                <option disabled selected>Pilih jenis usaha</option>
                                <option value="Kuliner" <?= ($merchant->jenis == "Kuliner" ? 'selected="selected"' : '') ?>>Kuliner</option>
                                <option value="Sembako" <?= ($merchant->jenis == "Sembako" ? 'selected="selected"' : '') ?>>Sembako</option>
                                <option value="Perabot" <?= ($merchant->jenis == "Perabot" ? 'selected="selected"' : '') ?>>Perabot</option>
                                <option value="Elektronik" <?= ($merchant->jenis == "Elektronik" ? 'selected="selected"' : '') ?>>Elektronik</option>
                                <option value="Pakaian" <?= ($merchant->jenis == "Pakaian" ? 'selected="selected"' : '') ?>>Pakaian</option>
                                <option value="Bahan bangunan" <?= ($merchant->jenis == "Bahan bangunan" ? 'selected="selected"' : '') ?>>Bahan bangunan</option>
                                <option value="Perhiasan" <?= ($merchant->jenis == "Perhiasan" ? 'selected="selected"' : '') ?>>Perhiasan</option>
                                <option value="Kendaraan" <?= ($merchant->jenis == "Kendaraan" ? 'selected="selected"' : '') ?>>Kendaraan</option>
                                <option value="Warung kecil" <?= ($merchant->jenis == "Warung kecil" ? 'selected="selected"' : '') ?>>Warung kecil</option>
                                <option value="Toserba" <?= ($merchant->jenis == "Toserba" ? 'selected="selected"' : '') ?>>Toserba/Swalayan</option>
                                <option value="Mainan" <?= ($merchant->jenis == "Mainan" ? 'selected="selected"' : '') ?>>Mainan</option>
                                <option value="Jasa" <?= ($merchant->jenis == "Jasa" ? 'selected="selected"' : '') ?>>Jasa</option>
                                <option value="Lainnya" <?= ($merchant->jenis == "Lainnya" ? 'selected="selected"' : '') ?>>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control" id="u_buka_merchant" name="buka" placeholder="Jam Buka" maxlength="5" value="<?=$merchant->buka;?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control" id="u_tutup_merchant" name="tutup" placeholder="Jam Tutup" value="<?=$merchant->tutup;?>" maxlength="5">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="alamat_merchant">Alamat</label>
                            <textarea class="form-control" id="u_alamat_merchant" name="alamat" placeholder="Alamat"><?=$merchant->alamat;?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="deskripsi_merchant">Deskripsi usaha</label>
                            <textarea class="form-control" id="u_deskripsi_merchant" name="deskripsi" placeholder="Deskripsi"><?=$merchant->deskripsi;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar_merchant">Logo</label>
                        <input type="file" class="form-control" id="u_gambar_merchant" name="gambar">
                    </div>
                    <button id="tombol_ubah_merchant" onclick="upload_form_modal('#tombol_ubah_merchant','#form_update_merchant','merchant/<?=$merchant->id;?>/update','#MUbahMerchant');" class="btn btn-primary">Daftarkan</button>
                </form>
            </div>
        </div>
        <?
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchant $merchant)
    {
        try {
            if(request()->file('gambar')){
                Storage::delete($merchant->gambar);
                $gambar = request()->file('gambar')->store("merchant");
                $merchant->gambar = $gambar;
            }
            $merchant->nama = $request->nama;
            $merchant->jenis = $request->jenis;
            $merchant->alamat = $request->alamat;
            $merchant->deskripsi = $request->deskripsi;
            $merchant->buka = $request->buka;
            $merchant->tutup = $request->tutup;

            $merchant->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Merchant '. $request->nama . ' Updated',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
