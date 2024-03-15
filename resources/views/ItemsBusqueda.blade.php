@extends('layouts.canvas')

@section('content')
    <!-- Content
                              ============================================= -->
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
                            <h1>Items resultados de busqueda</h1>
                        </div><!-- .entry-title end -->

                        <div class="entry">
                            
                            @if (! is_null($items_busqueda))
                                @foreach ($items_busqueda as $item)
                                    <div class="entry">
                                        <b>CUDAP. EXP-UBA</b> {{$item->numero}} <b>CUDAP. EXP-UBA</b> {{$item->resumen}} <a href="#">ver despacho</a>
                                    </div>
                                    
                                @endforeach
                            @endif

                            @if (is_null($items_busqueda))
                                <h2>La busqueda no arrojó resultados</h2>
                            @endif
                            
                        </div>
                    </div><!-- .entry end -->


                    
                    <div class="entry">
                        <div class="entry-title">
                            <div>
                                <p>Realizar nuevamente una busqueda <a href="{{ route('busqueda') }}">Hacer clic acá</a></p>
                            </div>
                        </div><!-- .entry-title end -->
                    </div><!-- .entry end -->




                </div>

            </div>

    </section><!-- #content end -->
@endsection