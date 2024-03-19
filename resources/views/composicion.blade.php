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
                                <div class="fw-semibold">{{ $facultad->name }}</div>

                            </div>
                            <div class="col">
                                @foreach ($facultad->users as $user)
                                    @if ($user->web == 'V' && $user->estado)
                                        <div>{{ $user->lastname . ', ' . $user->name }}</div>
                                    @endif
                                @endforeach
                            </div>


                        </div>
                        <hr>
                    @endforeach

                    <div class="clear"></div>

                </div>
                <!-- .entry end -->


                <div class="entry-title mt-5">
                    <h2>Claustro Profesores</h2>
                </div><!-- .entry-title end -->

                    <!-- Entry Content
                                                                                                                                                                                                                                                                                                                                                   ============================================= -->
                    <div class="entry-content mt-1">
                        <hr>
                        <div class="d-flex">
                            <div class="col">
                                <div class="fw-semibold">Titulares</div>
                            </div>
                            <div class="col">
                                @foreach ($profesoresT as $profesorT)
                                    <div>{{ $profesorT->lastname . ',' . $profesorT->name }}</div>
                                @endforeach
                            </div>
                        </div>
                        <hr>

                        <div class="clear"></div>

                    </div>


                    <div class="entry-content mt-0">
                        <div class="d-flex">
                            <div class="col">
                                <div class="fw-semibold">Suplentes</div>
                            </div>
                            <div class="col">
                                @foreach ($profesoresS as $profesorS)
                                    <div>{{ $profesorS->lastname . ',' . $profesorS->name }}</div>
                                @endforeach
                            </div>
                        </div>
                        <hr>

                        <div class="clear"></div>

                    </div>

                    <div class="entry-title mt-5">
                        <h2>Claustro Graduados</h2>
                    </div><!-- .entry-title end -->



                    <!-- Entry Content
                                                                                                                                                                                                                                                                                                                                                   ============================================= -->
                    <div class="entry-content mt-1">
                        <hr>

                        <div class="d-flex">
                            <div class="col">
                                <div class="fw-semibold">Titulares</div>
                            </div>
                            <div class="col">
                                @foreach ($graduadosT as $graduadosT)
                                    <div>{{ $graduadosT->lastname . ',' . $graduadosT->name }}</div>
                                @endforeach
                            </div>
                        </div>
                        <hr>

                        <div class="clear"></div>

                    </div>
                    <div class="entry-content mt-0">
                        <div class="d-flex">
                            <div class="col">
                                <div class="fw-semibold">Suplentes</div>
                            </div>
                            <div class="col">
                                @foreach ($graduadosS as $graduadosS)
                                    <div>{{ $graduadosS->lastname . ',' . $graduadosS->name }}</div>
                                @endforeach
                            </div>
                        </div>
                        <hr>

                        <div class="clear"></div>

                    </div>

                    <div class="entry-title mt-5">
                        <h2>Claustro Estudiantes</h2>
                    </div><!-- .entry-title end -->

                    <!-- Entry Content
                                                                                                                                                                                                                                                                                                                                                   ============================================= -->
                    <div class="entry-content mt-1">
                        <hr>

                        <div class="d-flex">
                            <div class="col">
                                <div class="fw-semibold">Titulares</div>
                            </div>
                            <div class="col">
                                @foreach ($estudiantesT as $estudianteT)
                                    <div>{{ $estudianteT->lastname . ',' . $estudianteT->name }}</div>
                                @endforeach
                            </div>
                        </div>
                        <hr>

                        <div class="clear"></div>

                    </div>
                    <div class="entry-content mt-0">
                        <div class="d-flex">
                            <div class="col">
                                <div class="fw-semibold">Suplentes</div>
                            </div>
                            <div class="col">
                                @foreach ($estudiantesS as $estudianteS)
                                    <div>{{ $estudianteS->lastname . ',' . $estudianteS->name }}</div>
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
