@extends('layouts.canvas')

@section('content')
  <section class="page-title dark" data-bs-theme="dark">
    <div class="container">
      <div class="page-title-row">

        <div class="page-title-content">
          <h1>Composición</h1>
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

        <div class="single-post mb-0  mt-0 col-md-8 mx-auto">

          <!-- Single Post
                                                                                                                                                                                                                                                                                                                                                                    ============================================= -->
          <div class="entry">

            <!-- Entry Title
                                                                                                                                                                                                                                                                                                                                                                     ============================================= -->
            <div class="entry-title">
              <h2>Composición del Consejo Superior</h2>
            </div><!-- .entry-title end -->
            <hr>
            <div class="entry-title">
              <h2>Decanos</h2>
            </div><!-- .entry-title end -->



            <!-- Entry Content
                                                                                                                                                                                                                                                                                                                                                                     ============================================= -->
            <div class="entry-content mt-0">
              <hr>


              @foreach ($facultades as $facultad)
                <div class="d-flex">
                  <div class="col">
                    <P>{{ $facultad->name }}</P>

                  </div>
                  <div class="col">
                    @foreach ($facultad->users as $user)
                      @if ($user->web == 'V' && $user->estado)
                        <p>{{ $user->lastname . ', ' . $user->name }}</P>
                      @endif
                    @endforeach
                  </div>


                </div>
                <hr>
              @endforeach






              <div class="clear"></div>



            </div>
          </div><!-- .entry end -->
          <div class="entry-title">
            <h2>Claustro Profesores</h2>
          </div><!-- .entry-title end -->



          <!-- Entry Content
                                                                                                                                                                                                                                                                                                                                                                     ============================================= -->
          <div class="entry-content mt-0">
            <hr>


            <div class="d-flex  ">
              <div class="col">
                Titulares
              </div>
              <div class="col">
                @foreach ($profesoresT as $profesorT)
                  <p>{{ $profesorT->lastname . ',' . $profesorT->name }}
                @endforeach
              </div>
            </div>
            <hr>






            <div class="clear"></div>



          </div>
          <div class="entry-content mt-0">
            <div class="d-flex  ">
              <div class="col">
                Suplentes
              </div>
              <div class="col">
                @foreach ($profesoresS as $profesorS)
                  <p>{{ $profesorS->lastname . ',' . $profesorS->name }}
                @endforeach
              </div>
            </div>
            <hr>






            <div class="clear"></div>



          </div>

          <div class="entry-title">
            <h2>Claustro Graduados</h2>
          </div><!-- .entry-title end -->



          <!-- Entry Content
                                                                                                                                                                                                                                                                                                                                                                     ============================================= -->
          <div class="entry-content mt-0">
            <hr>


            <div class="d-flex  ">
              <div class="col">
                Titulares
              </div>
              <div class="col">
                @foreach ($graduadosT as $graduadosT)
                  <p>{{ $graduadosT->lastname . ',' . $graduadosT->name }}
                @endforeach
              </div>
            </div>
            <hr>






            <div class="clear"></div>



          </div>
          <div class="entry-content mt-0">
            <div class="d-flex  ">
              <div class="col">
                Suplentes
              </div>
              <div class="col">
                @foreach ($graduadosS as $graduadosS)
                  <p>{{ $graduadosS->lastname . ',' . $graduadosS->name }}
                @endforeach
              </div>
            </div>
            <hr>






            <div class="clear"></div>



          </div>

          <div class="entry-title">
            <h2>Claustro Estudiantes</h2>
          </div><!-- .entry-title end -->



          <!-- Entry Content
                                                                                                                                                                                                                                                                                                                                                                     ============================================= -->
          <div class="entry-content mt-0">
            <hr>


            <div class="d-flex  ">
              <div class="col">
                Titulares
              </div>
              <div class="col">
                @foreach ($estudiantesT as $estudianteT)
                  <p>{{ $estudianteT->lastname . ',' . $estudianteT->name }}
                @endforeach
              </div>
            </div>
            <hr>






            <div class="clear"></div>



          </div>
          <div class="entry-content mt-0">
            <div class="d-flex  ">
              <div class="col">
                Suplentes
              </div>
              <div class="col">
                @foreach ($estudiantesS as $estudianteS)
                  <p>{{ $estudianteS->lastname . ',' . $estudianteS->name }}
                @endforeach
              </div>
            </div>
            <hr>






            <div class="clear"></div>



          </div>
        </div><!-- .entry end -->

      </div>
    </div>
  </section><!-- #content end -->
@endsection
