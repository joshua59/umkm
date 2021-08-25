<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $merchant = Merchant::with('owner')->where('nama','like','%'.$keywords.'%')->paginate(8);
            return view('home.list',compact('merchant'));
        }
        return view('home.main');
    }
    public function show(Request $request, User $user)
    {
        if ($request->ajax()) {
            $merchant = Merchant::where('user_id', $user->id)->first();
            $keywords = $request->keywords;
            $produk = Product::where('merchant_id', $merchant->id)->where('nama','like','%'.$keywords.'%')->paginate(8);
            return view('home.produk',compact('produk','merchant'));
        }
        $merchant = Merchant::with('owner')->where('user_id', $user->id)->first();
        $comment = Comment::where('merchant_id', $merchant->id)->orderBy('created_at','DESC')->get();
        return view('home.detail', compact('merchant','comment'));
    }
}