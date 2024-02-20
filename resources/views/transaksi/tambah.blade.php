@extends('layouts.main')

@section('title', 'Transaksi')
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
          Tambah Data Transaksi
        </p>
       
      </header>
      <div class="card-content">
      <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
          <div class="field">
            <div class="field-body">
              <div class="field">
                <!-- <div class="control icons-left">
                  <input class="input" type="text" placeholder="Merk" name="merk" >
                  <span class="icon left"><i class="mdi mdi-label-outline"></i></span>
                </div> -->

                <select name="barang" id="barang" class="input" onchange='updateInput(document.getElementById("barang").value)'>
                    <option value="">-- Barang --</option>
                        @foreach ($Barangs as $barang)
                          <option value="{{ $barang->id_barang }}">
                            {{ $barang->nama_produk }}
                          </option>
                        @endforeach
                </select>
              </div>
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="number" placeholder="Harga" name="harga" id="harga" readonly>
                  <span class="icon left"><i class="mdi mdi-coins"></i></span>
                </div>
              </div>
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="number" placeholder="Total Item" name="total_item" id='qty' onchange='updatetHarga(document.getElementById("harga").value)' type="number" placeholder="Qty" value='1'>
                  <span class="icon left"><i class="mdi mdi-coins"></i></span>
                </div>
              </div>
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="readonly" placeholder="total_harga" id='tharga' value='' name="total_harga" readonly>
                  <span class="icon left"><i class="mdi mdi-coins"></i></span>
                </div>
              </div>
              <select name="status_pembayaran" class="input">
                    <option value="">-- Status Pembayaran --</option>
                    <option value="selesai">Selesai</option>
                    <option value="belum selesai">Belum Selesai</option>
                      </select>
                </select>
              
            </div>
          </div>
          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>
          </div>
        </form>
     
      </div>
    </div>   
  </section>

  <script>
        function updatetHarga(input){
            document.getElementById("tharga").value=input*document.getElementById("qty").value;
        }
        function updateInput(input){
            var barang = @json($Barangs);
            for (let i = 0; i< barang.length;i++){
                if (barang[i].id_barang == input) {
                    document.getElementById("harga").value=barang[i].harga;
                    updatetHarga(document.getElementById("harga").value=barang[i].harga);
                }
            }
        }
  </script>