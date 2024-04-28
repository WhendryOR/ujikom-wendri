<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function index()
    {
        $konsumen = Konsumen::all();

        return view('konsumen.index', compact('konsumen'));
    }

    public function store(Request $request){
        $rules = [
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ];

        $request -> validate($rules);

        $data = [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ];

        Konsumen::create($data);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ];

        $request -> validate($rules);

        $data = [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ];

        Konsumen::find($id)->update($data);

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        Konsumen::find($id)->delete();

        return redirect()->back();
    }
}
