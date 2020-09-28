<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Makanan;
use App\Detailorder;

class MakananController extends Controller
{
    //
   

    //  DATA MAKANAN

    public function create()
    {
        return view('admin.form_makanan');
    }

    // TAMBAH MAKANAN
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
            
            'nama'        =>'required',
            'harga'=> 'required',
            'status'    => 'required',
            'gambar'    => 'required',
            
            ]
        );

        $image = $request->file('gambar');
        $nama_file = $image->getClientOriginalName();
        $image->move(base_path('/public/assets/gambar_makanan'), $nama_file);
        
        $makanan = new Makanan();
        $makanan->nama = $validateData['nama'];
        $makanan->harga = $validateData['harga'];
        $makanan->status = $validateData['status'];
        $makanan->gambar = $nama_file;
        // $makanan->gambar = $validateData['gambar'];
        $makanan->save();

        return redirect('/makanan');
    }

    // EDIT FOOD
    public function edit($id_makanan){
        $makanan = Makanan::find($id_makanan);
        return view('admin.edit', ['makanan' => $makanan]);
    }

    public function update($id_makanan, Request $request)
    {
        $this->validate($request,
        [
            'nama'        =>'required',
            'harga'=> 'required',
            'status'    => 'required',
            'gambar'    => 'required',
        ]);
    
        
        $makanan = Makanan::find($id_makanan);
        $makanan->nama = $request->nama;
        $makanan->harga = $request->harga;
        $makanan->status = $request->status;
        $makanan->gambar = $request->gambar;
        $makanan->save();
 
     return redirect('/makanan');
    }

    //DELETE FOOD
    public function delete_menu($id_makanan)
    {
        $foods = Makanan::find($id_makanan);
        $foods->delete();
        return redirect('/makanan');
    }
    
    // TAMPIL DATA MAKANAN
    public function showw()
    {
        $makanan = Makanan::all();
        return view('admin.table',['makanan'=>$makanan]);
    }

    // PDF MAKANAN
    public function cetak_pdf_makanan()
    {
        $makanan = Makanan::all();
        $pdf = PDF::loadview('admin.makanan_pdf',['makanan'=>$makanan]);
        return $pdf->download('makanan_pdf.pdf');
    }


    // TRANSAKSI

    // UNTUK INVOICE
    public function edit_transaksi($id_transaksi)
    {
        $detail = Detailorder::find($id_transaksi);
        return view('kasir.form_detail',['detaill'=>$detail]);
    }

    // TAMPIL DATA MAKANAN
    public function showdiuser()
    {
        $makanan = Makanan::all();
        return view('kasir.menu',['makanann'=>$makanan]);
    }

    // TAMPIL DATA TRANSAKSI
    public function show()
    {
        $detail_order = Detailorder::all();
        return view('kasir.tablee_transaksi',['detail'=>$detail_order]);
    }

    // FORM PEMBELIAN
    public function editt($id){
        $detailorder = Makanan::find($id);
        return view('kasir.form_beli', ['makanan' => $detailorder]);
    }

    public function storee(Request $request)
    {
        $validateData = $request->validate(
            [
            // 'noppdb'      =>'required|size:10',
            'id_makanan'     => 'required',
            'id_user'     => 'required',
            'nama_pembeli'        =>'required',
            'nama_menu'           => 'required',
            'status'         => 'required',
            'harga'          => 'required',
            'jumlah_beli'    => 'required',
            'total_harga'    => 'required',
            'pembayaran'      => 'required',
            'kembalian'        => 'required'
            ]
        );
        
        $detailorder = new Detailorder();
        $detailorder->id_makanan = $validateData['id_makanan'];
        $detailorder->id_user = $validateData['id_user'];
        $detailorder->nama_pembeli = $validateData['nama_pembeli'];
        $detailorder->nama_menu = $validateData['nama_menu'];
        $detailorder->harga = $validateData['harga'];
        $detailorder->status = $validateData['status'];
        $detailorder->jumlah_beli = $validateData['jumlah_beli'];
        $detailorder->total_harga = $validateData['total_harga'];
        $detailorder->pembayaran = $validateData['pembayaran'];
        $detailorder->kembalian = $validateData['kembalian'];
        $detailorder->save();

        return redirect('/transaksi');
    }

    // DELETE TRANSAKSI
    public function delete_transaksi($id_transaksi)
    {
        $trans = Detailorder::find($id_transaksi);
        $trans->delete();
        return redirect('/transaksi');
    }

    // PDF TRANSAKSI
    public function cetak_pdf_transaksi()
    {
        $detail = Detailorder::all();
        $pdf = PDF::loadview('kasir.transaksi_pdf',['detail'=>$detail]);
        return $pdf->download('transaksi_pdf.pdf');
    }
    
}
