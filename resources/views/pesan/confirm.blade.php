@extends('layouts.app')

@section('content')
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">

        <div class="container center clearfix">

            <div class="heading-block center">
                <h1>Checkout Success</h1>
                <span>Pesanan anda sedang kami proses</span>
            </div>
            {{-- <p>Quod aut totam adipisci fugit dolor tempora quasi odit, qui aliquam fuga voluptatibus quas eos earum facilis corporis quibusdam eius! Molestiae dolorum nisi quod aperiam ullam libero qui autem alias laborum totam voluptatibus aliquam commodi nobis ipsum excepturi repellendus nihil labore est possimus magni aliquid, sed culpa ad explicabo! Esse, provident, autem.</p> --}}

            <a href="{{ url('/') }}" class="btn btn-secondary topmargin-sm">Back to Home</a>

        </div>
    </div>
</section><!-- #content end -->
@endsection
