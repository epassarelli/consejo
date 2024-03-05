@extends('layouts.canvas')

@section('content')
  <section class="page-title dark" data-bs-theme="dark">
    <div class="container">
      <div class="page-title-row">

        <div class="page-title-content">
          <h1>Orden del día</h1>
          <span>Consejo Superior</span>
        </div>

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#">Templates</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
          </ol>
        </nav>

      </div>
    </div>
  </section>
  <!-- Content
                                ============================================= -->
  <section id="content">
    <div class="content-wrap">
      <div class="container">

        <div class="single-post mb-0 mt-0 col-md-8 mx-auto">

          <!-- Single Post
                                    ============================================= -->
          <div class="entry">

            <!-- Entry Title
                                     ============================================= -->
            <div class="entry-title">
              <h2>Orden del día</h2>
            </div><!-- .entry-title end -->

            <hr>

            <div class="entry-title">
              <h2>Sesion del Consejo Superior del día {{ $sesion->fecha }}</h2>
            </div><!-- .entry-title end -->

            <br>

            <div class="entry">
              <a href="{{ __DIR__ . '/../sessions/' . $sesion->pdf }}">
                <div>Indice del orden del día</div>
              </a>
              <a href="{{ __DIR__ . '/../sessions/' . $sesion->pdf }}">
                <div>Temario del orden del día</div>
              </a>
            </div>


            <div class="entry-title">
              <h2>COMISIONES</h2>
            </div><!-- .entry-title end -->


            <div class="entry">

              @foreach ($comisiones as $item)
                <a href="#">
                  <div>{{ $item->nombre_comision }}</div>
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
              <h1>Items por comisiones</h1>
            </div><!-- .entry-title end -->


            <div class="entry">

              @foreach ($itemsTemario as $item)
                <div class="entry">
                  <b>CUDAP. EXP-UBA</b> {{ $item->numero }} <b>CUDAP. EXP-UBA</b> {{ $item->resumen }} <a
                    href="#">ver despacho</a>
                </div>
              @endforeach

            </div>
          </div><!-- .entry end -->


          <div class="entry">
            <div class="entry-title">
              <h2>Sesiones anteriores</h2>
              <div>
                <p>Para ver sesiones anteriores a esta orden siga el siguiente enlace <a
                    href="{{ '/sesiones-anteriores/' . $sesion->fecha }}">ver Sesiones anteriores</a></p>
              </div>
            </div><!-- .entry-title end -->
          </div><!-- .entry end -->




        </div>

      </div>

  </section><!-- #content end -->
@endsection
