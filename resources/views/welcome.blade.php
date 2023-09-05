@extends('layouts.app')
@section('content')
    <!-- Content
    ============================================= -->
    <div class="content-wrap">
        
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7">
                    <div class="heading-block">
                        @guest
                            <h1>Welcome, to Batik Gunting.</h1>
                        @else
                            <h1>Welcome, {{ Auth::user()->name }} to Batik Gunting.</h1>
                        @endguest
                    </div>
                    <p class="lead">Batik adalah hasil karya bangsa Indonesia yang merupakan perpaduan antara seni dan teknologi oleh leluhur bangsa Indonesia. Batik Indonesia dapat berkembang hingga sampai pada suatu tingkatan yang tak ada bandingannya baik dalam desain/motif maupun prosesnya. Corak ragam batik yang mengandung penuh makna dan filosofi akan terus digali dari berbagai adat istiadat maupun budaya yang berkembang  di Indonesia.</p>
                </div>

                {{-- <div class="col-lg-7 align-self-end">

                    <div class="position-relative overflow-hidden">
                        <img src="images/services/main-fbrowser.png" data-animate="fadeInUp" data-delay="100" alt="Chrome">
                        <img src="images/services/main-fmobile.png" style="top: 0; left: 0; min-width: 100%; min-height: 100%;" data-animate="fadeInUp" data-delay="400" alt="iPhone" class="position-absolute">
                    </div>

                </div> --}}

            </div>
        </div>

        <div class="section my-0">
            <div class="container">

                <div class="row mt-4 col-mb-50">

                    <div class="col-lg-4">
                        <i class="i-plain color i-large icon-line2-screen-desktop inline-block" style="margin-bottom: 15px;"></i>
                        <div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
                            <span class="before-heading">Scalable on Devices.</span>
                            <h4>Responsive &amp; Retina</h4>
                        </div>
                        <p>Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>
                    </div>

                    <div class="col-lg-4">
                        <i class="i-plain color i-large icon-line2-energy inline-block" style="margin-bottom: 15px;"></i>
                        <div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
                            <span class="before-heading">Smartly Coded &amp; Maintained.</span>
                            <h4>Powerful Performance</h4>
                        </div>
                        <p>Medecins du Monde Jane Addams reduce child mortality challenges Ford Foundation. Diversification shifting landscape advocate pathway to a better life rights international. Assessment.</p>
                    </div>

                    <div class="col-lg-4">
                        <i class="i-plain color i-large icon-line2-equalizer inline-block" style="margin-bottom: 15px;"></i>
                        <div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
                            <span class="before-heading">Flexible &amp; Customizable.</span>
                            <h4>Truly Multi-Purpose</h4>
                        </div>
                        <p>Democracy inspire breakthroughs, Rosa Parks; inspiration raise awareness natural resources. Governance impact; transformative donation philanthropy, respect reproductive.</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection