@extends('layouts.main')

@section('title', 'Dashboard')
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

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Data Transaksi
    </h1>
    <a href="{{ route('transaksi.create') }}" class="button light">Tambah Transaksi</a>
  </div>
</section>

  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        {{-- <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Transaksi
        </p> --}}
       
      </header>
      <div class="card-content">
        <table>
          <thead>
            <th>ID Transaksi</th>
            <th>Nama Barang</th>
            <th>Total Item</th>
            <th>Total Harga</th>
            <th>Status Pembayaran</th>
            <th>Tanggal Transaksi</th>
            <th>Action</th>
          </thead>
          <tbody>
          @forelse ($Transaksis as $transaksi)
          <tr>
            <td data-label="id_transaksi">{{ $transaksi->id_transaksi }}</td>
            <td data-label="nama_item">{{ $transaksi->barang->nama_produk}}</td>
            <td data-label="total_item">{{ $transaksi->total_item }}</td>
            <td data-label="total_harga">{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
            <td data-label="status_pembayaran">{{ $transaksi->status_pembayaran }}</td>
            <td data-label="Created">
              <small class="text-gray-500" title="Oct 25, 2021">{{ $transaksi->created_at }}</small>
            </td>
            <td> 
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}" method="POST">
                <a href="{{ route('transaksi.edit', $transaksi->id_transaksi) }}" class="button small green --jb-modal" type="button">
                  <span class="icon"><i class="mdi mdi-pencil"></i></span>
                </a>
                <a href="{{ route('transaksi.nota', $transaksi->id_transaksi) }}" class="button small blue --jb-modal" type="button" target="blank">
                    <span class="icon"><i class="mdi mdi-printer"></i></span>
                </a>
                @csrf
                @method('DELETE')
                <button class="button small red --jb-modal" type="submit">
                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
              </form>
            </td>
           
          </tr>
          @empty
          <tr>
          <div class="card empty">
            <div class="card-content">
              <div>
                <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
              </div>
              <p>Nothing's here…</p>
            </div>
          </div>
          </tr>
          @endforelse
          </tbody>
        </table>
     
      </div>
    </div>   
  </section>

@endsection