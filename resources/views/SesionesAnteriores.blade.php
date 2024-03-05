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
          <div class="entry">
            <div class="entry-title">
              <h2>Sesiones anteriores al {{ $fecha }}</h2>
            </div><!-- .entry-title end -->

            <table id="basic-table" class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Fecha</th>
                  <th>PDF</th>
                  <th>Youtube</th>
                  <th>Orden del dia</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sesiones as $sesion)
                  <tr>
                    <td>{{ $sesion->id }}</td>
                    <td>{{ date('d/m/Y', strtotime($sesion->fecha)) }}</td>
                    <td><a href="{{ $sesion->pdf }}" target="_blank">Ver pdf</a></td>
                    <td><a href="{{ $sesion->urlYoutube }}" target="_blank">Ver youtube</a></td>
                    <td><a href="{{ '/orden-del-dia/' . $sesion->fecha }}">Ver orden del dia</td>
                  </tr>
                @endforeach

              </tbody>

            </table>

          </div><!-- .entry end -->

        </div>

      </div>

    </div>

    </div>

  </section><!-- #content end -->
@endsection
