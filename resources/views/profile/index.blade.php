@extends('layouts.app')

@section('content')
<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1>My Profile</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Profile</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<section id="content">
    <div class="content-wrap">
        <div class="container">
            <form method="POST" action="{{ url('profile') }}">
                @csrf
                <div class="row col-mb-50 gutter-50">
                    <div class="col-lg-6">
                        <div class="row mb-0">
                            <div class="col-md-12 form-group">
                                <label for="billing-form-name">Name:</label>
                                <input type="text" id="billing-form-name" name="nama" value="{{ $user->name}}" class="sm-form-control" disabled />
                            </div>
                            <div class="w-100"></div>

                            <div class="col-md-12 form-group">
                                <label for="billing-form-email">Email Address:</label>
                                <input type="email" id="billing-form-email" name="email" value="{{ $user->email}}" class="sm-form-control" disabled />
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="billing-form-phone">Phone:</label>
                                <?php
                                    $format_nohp = chunk_split($user->nohp, 4, ' ');
                                ?>
                                <input type="text" id="billing-form-phone" name="billing-form-phone" value="{{ rtrim($format_nohp, ' ') }}" class="sm-form-control" disabled />
                            </div>

                            <div class="col-12 form-group">
                                <label for="alamat">Address:</label>
                                <textarea type="text" name="alamat" rows="4" class="sm-form-control" disabled >{{ $user->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="row mb-0">
                            <div class="col-md-12 form-group">
                                <label for="billing-form-name">Name:</label>
                                <input id="name" type="text" class="sm-form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-100"></div>

                            <div class="col-md-12 form-group">
                                <label for="billing-form-email">Email Address:</label>
                                <input id="email" type="email" class="sm-form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="billing-form-phone">Phone:</label>
                                <?php
                                    $format_nohp = chunk_split($user->nohp, 4, ' ');
                                ?>
                                <input id="nohp" type="text" class="sm-form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ rtrim($format_nohp, ' ') }}"  autocomplete="nohp">

                                @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 form-group">
                                <label for="alamat">Address:</label>
                                <textarea id="alamat" type="text" class="sm-form-control @error('alamat') is-invalid @enderror" name="alamat" value="" rows="4">{{ $user->alamat }}</textarea>
                                
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-3 form-group">
                                <button type="submit" class="button button-border button-rounded button-green mx-0"><i class="icon-save"></i>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection