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

                    <!-- Single Post ============================================= -->
                    <div class="entry">

                        <div class="entry-title">
                            <h2>Sesión de Consejo Superior {{ \Carbon\Carbon::parse($sesion->fecha)->format('d/m/Y') }}</h2>
                        </div><!-- .entry-title end -->
                        
                        <br>

                        <div class="entry">
                            <a class="text-decoration-underline" href="{{ __DIR__ . "/../sessions/" . $sesion->pdf }}">
                                Indice del orden del día
                            </a>
                            <br>
                            <a class="text-decoration-underline" href="{{ __DIR__ . "/../sessions/" . $sesion->pdf }}">
                                Temario del orden del día
                            </a>
                        </div>
                        

                        <div class="entry-title">
                            <h2>Comisiones</h2>
                        </div><!-- .entry-title end -->


                        <div class="entry">
                            
                            @foreach ($comisiones as $item)
                                <a class="text-decoration-underline"  href="{{ "/orden-del-dia/" . $sesion->fecha ."/" . $item->comision_id }}">
                                    {{$item->nombre_comision}}<br>
                                </a>
                            @endforeach
                            
                        </div>


                        <div class="entry-title">
                            <h2>Resoluciones dictadas "Ad referendum" para su aprobación por el consejo superior</h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Content
                                   ============================================= -->
                        <div class="entry-content mt-0">

                            <p>Resolución REREC-2023-1826-EUBA-RES del 12 de octubre de 2023 - Se limitan al 30 de septiembre
                                del año en curso los alcances de la resolución REREC-2023-1193-UBA-REC, ratificada por la 
                                RESCS-2023-1122-UBAREC por la cual se eprobarán los términos del "Acta AcuerdoParitario" 
                                del sector Nodocente, en nivel particular, subcrita con APUBA el 13 de.</p>



                        </div>

                        <div class="entry-title">
                            <h2>Items por comisiones</h2>
                        </div><!-- .entry-title end -->


                        <div class="entry">
                            
                            @foreach ($itemsTemario as $item)
                                <div class="entry">
                                    <b>CUDAP. EXP-UBA</b> {{$item->numero}} <b>CUDAP. EXP-UBA</b> {{$item->resumen}} <a class="text-decoration-underline" href="#">ver despacho</a>
                                </div>
                                
                            @endforeach
                            
                        </div>
                    </div><!-- .entry end -->
                    
                    
                    <div class="entry">
                        <div class="entry-title">
                            <h2>Sesiones anteriores</h2>
                            <div>
                                <p>Para ver sesiones anteriores a esta orden siga el siguiente enlace <a class="text-decoration-underline" href="{{ "/sesiones-anteriores/" . $sesion->fecha }}">ver sesiones anteriores</a></p>
                            </div>
                        </div><!-- .entry-title end -->
                    </div><!-- .entry end -->




                </div>

            </div>

    </section><!-- #content end -->
@endsection