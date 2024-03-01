@extends('layouts.canvas')

@section('content')
    <!-- Content
                              ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">

                <div class="entry">
                    <div class="entry-title">
                        <h2>Sesiones anteriores al {{$fecha}}</h2>
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
                            <td>{{$sesion->id}}</td>
                            <td>{{ date('d/m/Y', strtotime($sesion->fecha)) }}</td>
                            <td><a href="{{$sesion->pdf}}" target="_blank">Ver pdf</a></td>
                            <td><a href="{{$sesion->urlYoutube}}" target="_blank">Ver youtube</a></td>
                            <td><a href="{{'/orden-del-dia/'.$sesion->fecha}}">Ver orden del dia</td>
                        </tr>
                        @endforeach

                    </tbody>
                    
                    </table>

                </div><!-- .entry end -->
                        
            </div>

        </div>

    </div>

    </section><!-- #content end -->
@endsection