@extends('layouts.main')

@section('title', 'Edit Transaksi')
@section('container')

@include('partials.navbar')
@include('partials.sidebar')

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Dashboard</li>
    </ul>
  </div>
</section>

<section class="section main-section">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-plus-box-outline"></i></span>
        Edit Data Transaksi
      </p>
    </header>
    <div class="card-content">
      <form action="{{ route('transaksi.update', $Transaksis->id_transaksi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
          <div class="field-body">
            <div class="field">
              <select name="barang" id="barang" class="input" onchange='updateInput(this.value)'>
                <option value="">-- Barang --</option>
                @foreach ($Barangs as $barang)
                <option value="{{ $barang->id_barang }}" {{ $Transaksis->id_barang == $barang->id_barang ? 'selected' : '' }}>
                  {{ $barang->nama_produk }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="field">
              <div class="control icons-left">
                <input class="input" type="number" placeholder="Harga" name="harga" id="harga" value="{{ old('harga', $Transaksis->barang->harga) }}" readonly>
                <span class="icon left"><i class="mdi mdi-coins"></i></span>
              </div>
            </div>
            <div class="field">
              <div class="control icons-left">
                <input class="input" type="number" placeholder="Total Item" name="total_item" id="qty" value="{{ old('total_item', $Transaksis->total_item) }}" onchange="updateHarga()">
                <span class="icon left"><i class="mdi mdi-coins"></i></span>
              </div>
            </div>
            <div class="field">
              <div class="control icons-left">
                <input class="input" type="number" placeholder="Total Harga" name="total_harga" id="tharga" value="{{ old('total_harga', $Transaksis->total_harga) }}" readonly>
                <span class="icon left"><i class="mdi mdi-coins"></i></span>
              </div>
            </div>
            <select name="status_pembayaran" class="input">
              <option value="">-- Status Pembayaran --</option>
              <option value="selesai" {{ old('status_pembayaran', $Transaksis->status_pembayaran) == 'selesai' ? 'selected' : '' }}>Selesai</option>
              <option value="belum selesai" {{ old('status_pembayaran', $Transaksis->status_pembayaran) == 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
            </select>
          </div>
        </div>
        <div class="field grouped">
          <div class="control">
            <button type="submit" class="button green">Submit</button>
          </div>
          <div class="control">
            <button type="reset" class="button red">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  function updateHarga() {
    let harga = document.getElementById("harga").value;
    let qty = document.getElementById("qty").value;
    document.getElementById("tharga").value = harga * qty;
  }

  function updateInput(selectedBarangId) {
    let barang = @json($Barangs);
    for (let i = 0; i < barang.length; i++) {
      if (barang[i].id_barang == selectedBarangId) {
        document.getElementById("harga").value = barang[i].harga;
        updateHarga();
      }
    }
  }
</script>

@endsection
