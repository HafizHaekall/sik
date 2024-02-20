<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TransaksiController extends Controller
{
    public function index()
    {
        $Transaksis = Transaksi::all();
        return view('dashboard', compact('Transaksis'));
    }

    public function create(): View
    {
        $Barangs = Barang::all();
        return view('transaksi/tambah', compact('Barangs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'barang' => 'required',
            'harga' => 'required|min:2',
            'total_item' => 'required|min:1',
            'total_harga' => 'required|min:2',
        ]);
        Transaksi::create([
            'id_barang' => $request->barang,
            'total_item' => $request->total_item,
            'total_harga' => $request->total_harga,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $Transaksis = Transaksi::findOrFail($id);
        $Barangs = Barang::all();

        return view('transaksi/edit', compact('Transaksis', 'Barangs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'barang' => 'required',
            'harga' => 'required|min:2',
            'total_item' => 'required|min:1',
            'total_harga' => 'required|min:2',
        ]);

        $Transaksi = Transaksi::findOrFail($id);

        $Transaksi->update([
            'id_barang' => $request->barang,
            'total_item' => $request->total_item,
            'total_harga' => $request->total_harga,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $Transaksi = Transaksi::findOrFail($id);
    
        $Transaksi->delete();
    
        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function NotaTransaksi($id)
    {
        $detail = Transaksi::where('id_transaksi', $id)->firstOrFail();
        $detail = Transaksi::where('id_transaksi', $id)->get();

        return view('transaksi/nota', compact('detail'));
    }
}
