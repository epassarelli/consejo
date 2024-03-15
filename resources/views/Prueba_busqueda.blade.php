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
                            <h1>Formulario de prueba para la busqueda</h1>
                        </div><!-- .entry-title end -->


                        <form method="GET">
                            @csrf
                            <label for="P_clave">Palabra clave</label><br>
                            <input type="text" name="parameter[P_clave]"><br><br>
                            
                            <label for="P_clave">Fecha de inicio de consejo</label><br>
                            <input type="date" name="parameter[fecha]"><br><br>

                            <label for="comision_id">Comisión:</label>
                            <select class="form-select" name="parameter[comision_id]">
                                <option selected value="">(Sin selección)</option>
                                @foreach ($comisiones as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select><br><br>
                            
                            <label for="facultad_id">Facultad:</label>
                            <select class="form-select" name="parameter[facultad_id]">
                                <option selected value="">(Sin selección)</option>
                                @foreach ($facultades as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select><br><br>
                            
                            <label for="N_expediente">N. Expediente / Año de expediente</label><br>
                            <input type="number" name="parameter[N_expediente]"> / <input type="number" name="parameter[a_expediente]"><br><br>
                            
                            <label for="N_resolucion">N. Resolución / Año de resolución</label><br>
                            <input type="number" name="parameter[N_resolucion]"> / <input type="number" name="parameter[a_resolucion]"><br><br>

                            <input type="submit" value="Buscar">
                        </form>
                    </div><!-- .entry end -->
                    
                </div>

            </div>

    </section><!-- #content end -->
@endsection