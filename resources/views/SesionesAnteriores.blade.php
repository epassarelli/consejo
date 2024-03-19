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
    <!-- Content
                              ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="single-post mb-0">

                    <div class="entry">

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
                                <td><a class="text-decoration-underline" href="{{$sesion->pdf}}" target="_blank">Ver pdf</a></td>
                                <td><a class="text-decoration-underline" href="{{$sesion->urlYoutube}}" target="_blank">Ver youtube</a></td>
                                <td><a class="text-decoration-underline" href="{{'/orden-del-dia/'.$sesion->fecha}}">Ver orden del dia</td>
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