<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Order;
use App\Models\Layanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $order = Order::with(['konsumen', 'pembayaran', 'layanan'])->latest()->get();
        $konsumen = Konsumen::all();
        $layanan = Layanan::all();
        $pembayaran = Pembayaran::all();
        $orderterakhir = Order::latest()->first();
        $kode = $orderterakhir ? 'KLND-' . (intval(substr($orderterakhir->kode, 5)) + 1) : 'KLND-1';
        
        return view('order.index', compact('konsumen', 'order', 'layanan', 'pembayaran', 'kode'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $data = Order::create([
            'kode' => $request -> kode,
            'id_konsumen' => $request -> id_konsumen,
            'id_layanan' => $request -> id_layanan,
            'id_pembayaran' => $request -> id_pembayaran,
            'harga' => $request -> harga,
            'jumlah' => $request -> jumlah,
            'total_harga' => $request -> total_harga,
            'uang_bayar' => $request -> uang_bayar,
            'uang_kembalian' => $request -> uang_kembalian
        ]);
        
        return redirect()->back();
    }
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $rules = [
            'status' => 'required'
        ];
        
        $request->validate($rules);
        
        $data = [
            'status' => $request -> status
        ];
        
        Order::find($id)->update($data);
        
        return redirect()->back();
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        Order::find($id)->delete();
        return redirect()->back();
    }
    
    public function print(string $id)
    {
        $order = Order::with(['konsumen', 'pembayaran', 'layanan'])->find($id);
        
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        
        $pdf = PDF::loadView('order.print', compact('order'));
        
        return $pdf->download('order_'.$id.'.pdf');
    }
    
    public function exportMonthlyReport(Request $request)
    {
        // Mengambil parameter bulan dan tahun dari request
        $month = $request->input('month');
        $year = $request->input('year');
        
        // Validasi bulan dan tahun (bisa disesuaikan dengan kebutuhan)
        $request->validate([
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|min:2000|max:'.date('Y'),
        ]);
        
        // Mendapatkan data order berdasarkan bulan dan tahun
        $order = Order::with(['konsumen', 'pembayaran', 'layanan'])
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->get();
        
        // Mengambil nama bulan
        $monthName = date('F', mktime(0, 0, 0, $month, 1));
        
        // Mengatur nama file PDF
        $filename = 'monthly_order_report_'.$monthName.'_'.$year.'.pdf';
        
        // Membuat PDF menggunakan data order yang ditemukan
        $pdf = PDF::loadView('order.laporan', compact('order', 'monthName', 'year'));

        
        // Mendownload PDF
        return $pdf->download($filename);
    }
    
}
