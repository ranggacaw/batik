@extends('layouts.app')

@section('content')
<div class="content-wrap">
    <div class="container">
        <h2 class="text-center mb-5">List Batik</h2>
        <div class="row justify-content-center">
            @foreach ($barangs as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top w-100 h-auto" src="{{url ('images/barangs')}}/{{ $item->gambar }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text mb-1">{{ $item->nama_barang }}</p>
                            <h4 class="mb-0">Rp {{ number_format($item->harga) }}</h3>
                            <p class="card-text mb-0">Stok : {{ $item->stok }}</p>
                            <p class="card-text mb-2">{{ $item->keterangan}}</p>
                            <div class="divider mt-0 mb-2"></div>
                            <a href="{{ url('pesan') }}/{{ $item->id }}" class="button button-small button-border button-rounded button-yellow mb-0">Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
