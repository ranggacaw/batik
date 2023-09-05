<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PesanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id) 
    {
        $barang = Barang::where('id', $id)->first();
        return view ('pesan.index', compact('barang'));
    }

    public function pesan(Request $request, $id) 
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        // validasi stok < pesnanan
        if ($request->jumlah_pesan > $barang->stok){

            Alert::error('Failed', 'Pesanan melebihi stok kami !');
            return redirect('pesan/'.$id);
        }

        // simpan ke table pesanan
        $pesanan = new Pesanan;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = $tanggal;
        $pesanan->status = 0;
        $pesanan->kode = mt_rand(100, 999);
        $pesanan->jumlah_harga = 0;
        $pesanan->save();

        // simpan ke table pesanandetail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->save();
        }else
        {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            // harga sekarang
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
        $pesanan->update();


        Alert::success('Success', 'Add to Cart !');
        return redirect('checkout');

    }
    
    public function checkout() 
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(!empty($pesanan)){
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id )->get();
        }
        else
        {
            $pesanan_details = [];
        }

        return view('pesan.checkout', compact('pesanan', 'pesanan_details'));

    }
    
    public function delete($id) 
    {
        $pesanan_detail = PesananDetail::where('id', $id )->first();
        $pesanan =  Pesanan::where('id', $pesanan_detail->pesanan_id)->first();

        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();
        $pesanan_detail->delete();

        Alert::warning('Success', 'Pesanan Berhasil di Hapus');
        return redirect('checkout');

    }

    public function confirm() 
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            Alert::warning('Failed', 'Harap Lengkapi Profile');
            return redirect('profile');
        }
        if(empty($user->nohp))
        {
            Alert::warning('Failed', 'Harap Lengkapi Profile');
            return redirect('profile');
        }
        
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $item)
        {
            $barang = Barang::where('id', $item->barang_id)->first();
            $barang->stok = $barang->stok - $item->jumlah;
            $barang->update();

        };

        Alert::success('Success', 'Pesanan Berhasil di Checkout');
        return redirect('history-detail/'.$pesanan_id);
    }
}
