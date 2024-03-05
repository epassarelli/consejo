@extends('layouts.canvas')

@section('content')
  <section class="page-title dark" data-bs-theme="dark">
    <div class="container">
      <div class="page-title-row">

        <div class="page-title-content">
          <h1>Buscador</h1>
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
              <h2>Buscador</h2>
            </div><!-- .entry-title end -->



            <!-- Entry Content
                                                                           ============================================= -->
            <div class="entry-content">

              <hr>
              <form>
                <div class="row g-3">
                  <div class="col-md-8 mt-4">
                    <label for="palabrasClaves" class="form-label">Palabras Claves</label>
                    <input type="text" class="form-control" id="palabrasClaves">
                  </div>

                  <div class="col-md-4 mt-4">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha">
                  </div>
                  <div class="col-md-6 mt-4">
                    <label for="comision" class="form-label">Comisión</label>
                    <select class="form-select" id="comision">
                      <option value="">Seleccionar</option>
                      <!-- Opciones de comision -->
                    </select>
                  </div>
                  <div class="col-md-6 mt-4">
                    <label for="facultad" class="form-label">Facultad</label>
                    <select class="form-select" id="facultad">
                      <option value="">Seleccionar</option>
                      <!-- Opciones de facultad -->
                    </select>
                  </div>
                  <div class="col-md-4 mt-4">
                    <label for="expediente" class="form-label">Expediente</label>
                    <input type="text" class="form-control" id="expediente">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label for="anio" class="form-label">Año</label>
                    <input type="number" class="form-control" id="anio" min="1000" max="9999">
                  </div>
                  <div class="col-md-2 mt-4">
                  </div>
                  <div class="col-md-4 mt-4">
                    <label for="resolucion" class="form-label">Resolución</label>
                    <input type="text" class="form-control" id="resolucion">
                  </div>
                  <div class="col-md-1 mt-4">
                    <label for="anioResolucion" class="form-label">Año</label>
                    <input type="number" class="form-control" id="anioResolucion" min="1000" max="9999">
                  </div>
                  <hr>
                  <div class="col-md-12 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger">Borrar formulario</button>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                </div>
              </form>


              <div class="clear"></div>



            </div>
          </div><!-- .entry end -->



        </div>

      </div>

  </section><!-- #content end -->
@endsection
