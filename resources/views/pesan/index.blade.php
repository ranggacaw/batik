@extends('layouts.app')

@section('content')
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1>Barang Detail</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/home') }}">Barang</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
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

				<form class="mb-0" method="post" action="{{ url('pesan') }}/{{ $barang->id }}">
					@csrf
					<div class="row">
						<div class="col-lg-7">
							<h4>Your Orders</h4>
	
							<div class="table-responsive">
								<table class="table cart">
									<thead>
										<tr>
											<th class="cart-product-thumbnail">&nbsp;</th>
											<th class="cart-product-name">Product</th>
											<th class="cart-product-stok">Stok</th>
											<th class="cart-product-quantity">Quantity</th>
											<th class="cart-product-subtotal">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-thumbnail">
												<a href="#"><img width="64" height="64" src="{{ url('images/barangs' )}}/{{ $barang->gambar }}" alt="photo items"></a>
											</td>
	
											<td class="cart-product-name">
												<a href="#">{{ $barang->nama_barang }}</a>
											</td>
	
											<td class="cart-product-stok">
												<a href="#">{{ $barang->stok }}</a>
											</td>
	
											<td class="cart-product-quantity">
												<div class="quantity clearfix">
													<input type="text" name="jumlah_pesan" value="" class="sm-form-control" required/>
												</div>
											</td>
	
											<td class="cart-product-subtotal">
												<span class="amount">Rp {{ number_format($barang->harga) }}</span>
											</td>
										</tr>
									</tbody>
	
								</table>
							</div>
							
							<a href="{{ url()->previous() }}" class="button button-border button-rounded button-yellow">Kembali</a>
						</div>
	
						<div class="col-lg-5">
							<h4>Cart Totals</h4>
	
							<div class="table-responsive">
								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="border-top-0 cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>
	
											<td class="border-top-0 cart-product-name">
												<span class="amount">$106.94</span>
											</td>
										</tr>
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
												<span class="amount color lead"><strong>{{ number_format($barang->harga * 2) }}</strong></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
	
							{{-- <div class="accordion clearfix">
								<div class="accordion-header">
									<div class="accordion-icon">
										<i class="accordion-closed icon-line-minus"></i>
										<i class="accordion-open icon-line-check"></i>
									</div>
									<div class="accordion-title">
										Direct Bank Transfer
									</div>
								</div>
								<div class="accordion-content clearfix">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</div>
	
								<div class="accordion-header">
									<div class="accordion-icon">
										<i class="accordion-closed icon-line-minus"></i>
										<i class="accordion-open icon-line-check"></i>
									</div>
									<div class="accordion-title">
										Cheque Payment
									</div>
								</div>
								<div class="accordion-content clearfix">Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</div>
	
								<div class="accordion-header">
									<div class="accordion-icon">
										<i class="accordion-closed icon-line-minus"></i>
										<i class="accordion-open icon-line-check"></i>
									</div>
									<div class="accordion-title">
										Paypal
									</div>
								</div>
								<div class="accordion-content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>
							</div> --}}
							<button type="submit" class="button button-border button-rounded button-green float-end">Masukan Keranjang</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section><!-- #content end -->
@endsection
