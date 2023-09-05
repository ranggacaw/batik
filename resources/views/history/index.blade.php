@extends('layouts.app')

@section('content')
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1>Checkout History</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Checkout History</li>
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
				<div class="row justify-content-md-center">
					<div class="col-12 col-lg-10">
						<h4>Your Orders</h4>

						<div class="table-responsive">
							<table class="table cart">
								<thead>
									<tr>
										<th class="cart-product-name">No</th>
										<th class="cart-product-name">Tanggal</th>
										<th class="cart-product-name">Status</th>
										<th class="cart-product-subtotal">Total</th>
										<th class="cart-product-detail">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
									?>
									@foreach ($pesanans as $item)
										<tr class="cart_item">
											<td class="cart-product-name">
												<a href="#">{{ $no++ }}</a>
											</td>
											<td class="cart-product-name">
												<a href="#">{{ $item->tanggal }}</a>
											</td>
											<td class="cart-product-name">
												<a href="#">
													@if ($item->status == 1)
														Unpaid
													@else
														Paid
													@endif
												</a>
											</td>
											<td class="cart-product-subtotal">
												<a href="#">{{ number_format($item->jumlah_harga + $item->kode) }}</a>
											</td>
											<td class="cart-product-detail">
												<a href="{{ url('history-detail') }}/{{ $item->id }}" class="btn btn-outline-warning">Details</i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>

							</table>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- #content end -->
    
@endsection