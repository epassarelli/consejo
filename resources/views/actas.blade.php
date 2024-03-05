@extends('layouts.canvas')

@section('content')
  <section class="page-title dark" data-bs-theme="dark">
    <div class="container">
      <div class="page-title-row">

        <div class="page-title-content">
          <h1>Actas</h1>
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
              <h2>Actas</h2>
            </div><!-- .entry-title end -->



            <!-- Entry Content
                                               ============================================= -->
            <div class="entry-content mt-0">

              <p>Se pone a disposición del público en general las actas de las distintas sesiones que se llevaron a cabo
                en el Salón del Consejo Superior de la Universidad de Buenos Aires.</p>
              <p>Los interesados pueden bajar el PDF de las actas</p>

              <div class="clear"></div>



            </div>
          </div><!-- .entry end -->



        </div>

      </div>

  </section><!-- #content end -->
@endsection
