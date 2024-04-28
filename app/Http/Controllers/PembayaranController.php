<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
        ];

        $request -> validate($rules);

        $data = [
            'nama' => $request->nama,
        ];

        Pembayaran::create($data);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required',
        ];

        $request -> validate($rules);

        $data = [
            'nama' => $request->nama,
        ];

        Pembayaran::find($id)->update($data);

        return redirect()->back();
    }

    public function destroy(Request $request, $id) 
    {
        Pembayaran::find($id)->delete();
        return redirect()->back();
    }
}
