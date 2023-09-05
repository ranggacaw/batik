@extends('layouts.app')

@section('content')
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1>Checkout Details</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ url('history') }}">Checkout History</a></li>
			<li class="breadcrumb-item active" aria-current="page">Checkout Details</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="row col-mb-50 gutter-50">
				<div class="w-100"></div>
				<div class="row">
					<div class="col-lg-8">
						<h4>Your Orders</h4>

						<div class="table-responsive">
							<table class="table cart">
								<thead>
									<tr>
										<th class="cart-product-thumbnail">&nbsp;</th>
										<th class="cart-product-name">Product</th>
										<th class="cart-product-quantity">Quantity</th>
										<th class="cart-product-quantity">Price</th>
										<th class="cart-product-subtotal">Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($pesanan_details as $item)
										<tr class="cart_item">
											<td class="cart-product-thumbnail">
												<a href="#"><img width="64" height="64" src="{{ url('images/barangs') }}/{{$item->barang->gambar}}" alt="photo items"></a>
											</td>
											<td class="cart-product-name">
												<a href="#">{{ $item->barang->nama_barang }}</a>
											</td>
											<td class="cart-product-quantity">
												<span class="amount">{{ number_format($item->jumlah) }}</span>
											</td>
											<td class="cart-product-quantity">
												<span class="amount">{{ number_format($item->barang->harga) }}</span>
											</td>
											<td class="cart-product-subtotal">
												<span class="amount">Rp {{ number_format($item->jumlah_harga) }}</span>
											</td>
										</tr>
									@endforeach
								</tbody>

							</table>
						</div>
						
					</div>

					<div class="col-lg-4">
						<h4>Cart Totals</h4>
							<div class="table-responsive">
								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Shipping</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">Free Delivery</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total</strong>
											</td>

											<td class="cart-product-name">
												@if (!@empty($pesanan))
													<span class="amount">{{ number_format($pesanan->jumlah_harga) }}</span>
												@else
													<span class="amount">{{ number_format(0) }}</span>
												@endif
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Kode Unik</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount color lead"><strong>{{ number_format($pesanan->kode) }}</strong></span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total Harga</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount color lead"><strong>Rp {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

						<a href="{{ url()->previous() }}" class="button button-border button-rounded button-yellow">Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- #content end -->
@endsection