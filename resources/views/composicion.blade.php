@extends('layouts.canvas')

@section('content')
    <section class="page-title dark" data-bs-theme="dark">
        <div class="container">
            <div class="page-title-row">

                <div class="page-title-content">
                    <h1>Inicio</h1>
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

                <div class="single-post mb-0">

                    <!-- Single Post
                                                                                                                                                                                                                                                                                  ============================================= -->
                    <div class="entry">

                        <!-- Entry Title
                                                                                                                                                                                                                                                                                   ============================================= -->
                        <div class="entry-title">
                            <h2>COMPOSICIÓN</h2>
                        </div><!-- .entry-title end -->
                        <hr>
                        <div class="entry-title">
                            <h2>DECANOS</h2>
                        </div><!-- .entry-title end -->



                        <!-- Entry Content
                                                                                                                                                                                                                                                                                   ============================================= -->
                        <div class="entry-content mt-0">
                            <hr>


                            @foreach ($facultades as $facultad)
                                <div class="d-flex  ">
                                    <div class="col">
                                        <P>{{ $facultad->name }}</P>

                                    </div>
                                    <div class="col">
                                        @foreach ($users as $user)
                                            <p>{{ $user }}</P>
                                        @endforeach
                                    </div>


                                </div>
                                <hr>
                            @endforeach






                            <div class="clear"></div>



                        </div>
                    </div><!-- .entry end -->
                    <div class="entry-title">
                        <h2>CLAUSTRO PROFESROES</h2>
                    </div><!-- .entry-title end -->



                    <!-- Entry Content
                                                                                                                                                                                                                                                                                   ============================================= -->
                    <div class="entry-content mt-0">
                        <hr>


                        @foreach ($facultades as $facultad)
                            <div class="d-flex  ">
                                <div class="col">
                                    <P>{{ $facultad }}</P>
                                </div>
                                <div class="col">
                                    {{-- @foreach ($users as $user)
                                            <P>{{ $user->name }}</P>
                                        @endforeach --}}
                                </div>


                            </div>
                            <hr>
                        @endforeach






                        <div class="clear"></div>



                    </div>
                </div><!-- .entry end -->
                <div class="entry-title">
                    <h2>CLAUSTRO GRADUADOS</h2>
                </div><!-- .entry-title end -->



                <!-- Entry Content
                                                                                                                                                                                                                                                                                   ============================================= -->
                <div class="entry-content mt-0">
                    <hr>


                    @foreach ($facultades as $facultad)
                        <div class="d-flex  ">
                            <div class="col">
                                <P>{{ $facultad }}</P>
                            </div>
                            <div class="col">
                                {{-- @foreach ($users as $user)
                                            <P>{{ $user->name }}</P>
                                        @endforeach --}}
                            </div>


                        </div>
                        <hr>
                    @endforeach

                    <div class="clear"></div>



                </div>
            </div><!-- .entry end -->


        </div>

        </div>

    </section><!-- #content end -->
@endsection
