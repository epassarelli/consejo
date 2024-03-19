@extends('layouts.canvas')

@section('content')

    <section class="page-title dark" data-bs-theme="dark">
        <div class="container">
            <div class="page-title-row">
                <div class="page-title-content">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Content ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">

                <div class="single-post mb-0">

                    <!-- Single Post
                                  ============================================= -->
                    <div class="entry">

                        <!-- Entry Title
                                   ============================================= -->

                        <div class="entry-title">
                            <h1>Items para la comisión {{ $name_comision }}</h1>
                        </div><!-- .entry-title end -->


                        <div class="entry">
                            
                            @foreach ($items_comision as $item)
                                <div class="entry">
                                    <b>CUDAP. EXP-UBA</b> {{$item->numero}} <b>CUDAP. EXP-UBA</b> {{$item->resumen}} <a href="#">ver despacho</a>
                                </div>
                                
                            @endforeach
                            
                        </div>
                    </div><!-- .entry end -->
                    
                    
                    <div class="entry">
                        <div class="entry-title">
                            <div>
                                <p>Para regresar a los orden del día siga el siguiente enlace <a href="{{ "/orden-del-dia/" . $fecha }}">ver Orden del día</a></p>
                            </div>
                        </div><!-- .entry-title end -->
                    </div><!-- .entry end -->




                </div>

            </div>

    </section><!-- #content end -->
@endsection