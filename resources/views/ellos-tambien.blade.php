@extends('layouts.canvas')

@section('content')
    <section class="page-title dark page-title-mini" data-bs-theme="dark">
        <div class="container">
            <div class="page-title-row">

                <div class="page-title-content">
                    <h1>Ellos también son Otro</h1>
                    <span>Nos vienen acompañando..</span>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ellos también son Otro</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>



    <div class="clear"></div>



    <section id="content">

        <div class="content-wrap">
            <div class="container">

                <div class="row col-mb-50">
                    <div class="col-md-4">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                                <img src="{{ asset('img/ellos/empresas.jpg') }}" alt="Restaurant">
                            </div>
                            <div class="fbox-content px-0">
                                <h3>Restaurant<span class="subtitle">Calle Nro. 3856</span></h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-box media-box flex-column">
                            <div class="fbox-media">
                                <img src="{{ asset('img/ellos/empresas.jpg') }}" alt="Restaurant">
                            </div>
                            <div class="fbox-content px-0">
                                <h3>Comida<span class="subtitle">Calle Nro. 8989</span></h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-box media-box flex-column">
                            <div class="fbox-media">
                                <img src="{{ asset('img/ellos/empresas.jpg') }}" alt="Restaurant">
                            </div>
                            <div class="fbox-content px-0">
                                <h3>Panadería<span class="subtitle">Calle Nro. 145</span></h3>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
@endsection
