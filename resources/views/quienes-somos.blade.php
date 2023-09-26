@extends('layouts.canvas')

@section('content')
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_half">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Nuestra <span>Misión</span>.</h4>
                    </div>

                    <p>Nuestra misión es la de generar conciencia de como a través de tus acciones cotidianas, colaboras con
                        alguien para mejorar su calidad de vida. Nos enfocamos principalmente en el Hambre, convencidos de
                        que sólo a través del desarrollo de las personas a las que nos dirigimos y generamos nuevas
                        oportunidades se garantiza el acceso a los demás ámbitos fundamentales, focalizando a otros aspectos
                        necesarios, como es la construcción y mantenimiento de infraestructuras sociales, sanidad y
                        seguridad alimentaria..</p>

                </div>

                <div class="col_half col_last">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Nuestra <span>visión</span>.</h4>
                    </div>

                    <p>Queremos ser una organización reconocida por el impacto de nuestras actuaciones en el bienestar y el
                        desarrollo de las comunidades con las que trabajamos así como por nuestra integridad y
                        profesionalidad en el modo de actuar.</p>

                </div>

            </div>
        </div>

        <!-- ============Counters============================= -->
        <div class="line">

            <div class="col_one_third nobottommargin center">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-globe"></i>
                <div class="counter counter-large" style="color: #2AA093;"><span data-from="1" data-to="1000"
                        data-refresh-interval="50" data-speed="2500"></span></div>
                <h5>Kms recorridos</h5>
            </div>

            <div class="col_one_third nobottommargin center">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-camera"></i>
                <div class="counter counter-large" style="color: #FCC23F;"><span data-from="1" data-to="2000"
                        data-refresh-interval="50" data-speed="3500"></span></div>
                <h5>Fotos registradas</h5>
            </div>

            <div class="col_one_third nobottommargin center col_last">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-coffee2"></i>
                <div class="counter counter-large" style="color: #009DB7;"><span data-from="1" data-to="300"
                        data-refresh-interval="30" data-speed="2700"></span></div>
                <h5>Platos entregados</h5>
            </div>
        </div>
        <!-- ============fin counters=========================== -->



        <!-- =============about-2.html===================== -->
        <div class="heading-block center">
            <h2>Equipo</h2>
            <span>Sobre los integrantes del equipo</span>
        </div>

        <div class="container clearfix">

            <div class="col-md-6 bottommargin">
                <div class="team team-list clearfix">
                    <div class="team-image">
                        <img src="images/quienes01.jpg" alt="CEO 01">
                    </div>
                    <div class="team-desc">
                        <div class="team-title">
                            <h4>Juan Perez</h4><span>CEO</span>
                        </div>
                        <div class="team-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti vero, animi suscipit id
                                facere officia. Aspernatur, quo, quos nisi dolorum aperiam fugiat deserunt velit rerum
                                laudantium cum magnam.</p>
                        </div>
                        <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 bottommargin">
                <div class="team team-list clearfix">
                    <div class="team-image">
                        <img src="images/quienes01.jpg" alt="Josh Clark">
                    </div>
                    <div class="team-desc">
                        <div class="team-title">
                            <h4>Juan Perez</h4><span>Co-Fundador</span>
                        </div>
                        <div class="team-content">
                            <p>Carbon emissions reductions giving, lLorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Corrupti vero, animi suscipit id facere officia. Aspernatur, quo, quos nisi dolorum
                                aperiam fugiat deserunt velit rerum laudantium cum magnam.</p>
                        </div>
                        <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>

    </section>
@endsection
