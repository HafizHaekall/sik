<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                return $next($request);
            } else {
                return redirect('/');
            }
        });
    }

    public function index(): View
    {
        $Barangs = Barang::latest()->paginate(5);
        return view('barang.index', compact('Barangs'));
    }

    public function create(): View
    {
        return view('barang.tambah');
    }

    public function store(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk' => 'required|min:2',
            'merk' => 'required|min:2',
            'harga' => 'required|min:2'
        ]);
            $image = $request->file('image');
            $image->storeAs('public/product', $image->hashName());
        Barang::create([
            'image' => $image->hashName(),
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'harga' => $request->harga
        ]);

        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // public function show(string $id): View
    // {
    //     $Barangs = Barang::findOrFail($id);

    //     return view('barang.show', compact('Barangs'));
    // }

    public function edit(string $id): View
    {
        $Barangs = Barang::findOrFail($id);

        return view('barang.edit', compact('Barangs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk' => 'required|min:2|unique:barangs,nama_produk,'.$id.',id_barang',
            'merk' => 'required|min:2',
            'harga' => 'required|min:2'
        ]);

        $Barang = Barang::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/product', $image->hashName());

            Storage::delete('public/product/'.$Barang->image);

            $Barang->update([
                'image' => $image->hashName(),
                'nama_produk' => $request->nama_produk,
                'merk' => $request->merk,
                'harga' => $request->harga
            ]);

        } else {

            $Barang->update([
                'nama_produk' => $request->nama_produk,
                'merk' => $request->merk,
                'harga' => $request->harga
            ]);
        }

        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $Barang = Barang::findOrFail($id);
    
        Storage::delete('public/product/'.$Barang->image);
    
        $Barang->delete();
    
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
