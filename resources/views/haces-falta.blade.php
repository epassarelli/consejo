@extends('layouts.canvas')

@section('content')
    <!-- Content
            ============================================= -->

    <section id="content">

        <div class="container clearfix">

            <!-- Postcontent
                        ============================================= -->
            <div class="postcontent nobottommargin">
                <div class="panel panel-default">
                    <div class="panel-body">
                        El movimiento y el ocio son necesarios para gozar de una buena salud, gracias por aportar moviéndote
                        y recorriendo los puntos gastronómicos. Te invitamos a sumarte como voluntario a nuestras causas,
                        completá el formulario y dejanos tus datos y como podés colaborar siendo "Otro" participando del día
                        de la intervención social, formando parte de los puntos de encuentro, redactando, sacando fotos, si
                        tenés alguna vocación y quieres volcarla al proyecto, si sos profesional y quieres intervenir
                        socialmente, tenga o no que ver con tu profesión. Escríbenos..cuéntanos que te gusta hacer.. Todo es
                        bienvenido y nos ayuda a ser Otro.
                    </div>
                </div>

                <h3>Registrate y nos contacteremos a la brevedad</h3>

                <div id="contact-form-result" data-notify-type="success"
                    data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                <form class="nobottommargin" id="template-contactform" name="template-contactform"
                    action="include/sendemail.php" method="post">

                    <div class="form-process"></div>

                    <div class="col_one_third">
                        <label for="template-contactform-name">Nombre <small>*</small></label>
                        <input type="text" id="template-contactform-name" name="template-contactform-name" value=""
                            class="sm-form-control required" />
                    </div>
                    <div class="col_one_third">
                        <label for="template-contactform-name">Apellido <small>*</small></label>
                        <input type="text" id="template-contactform-lastname" name="template-contactform-Name"
                            value="" class="sm-form-control required" />
                    </div>
                    <div class="col_one_third col_last">
                        <label for="template-contactform-email">Email <small>*</small></label>
                        <input type="email" id="template-contactform-email" name="template-contactform-email"
                            value="" class="required email sm-form-control" />
                    </div>

                    <div class="col_one_third">
                        <label for="template-contactform-phone">Teléfono</label>
                        <input type="text" id="template-contactform-phone" name="template-contactform-phone"
                            value="" class="sm-form-control" />
                    </div>
                    <div class="col_one_third col_last">
                        <label for="template-contactform-phone">Fecha Nacimiento (dd/mm/yyyy)</label>
                        <input type="text" id="template-contactform-birth" name="template-contactform-birth"
                            value="" class="sm-form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col_one_third">
                        <label for="template-contactform-service">Provincia</label>
                        <select id="template-contactform-provincia" name="template-contactform-provincia"
                            class="sm-form-control">
                            <option value="">-- Provincia --</option>
                            <option value="Misiones">Misiones</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Corrientes">Corrientes</option>
                            <option value="Entre Ríos">Entre Ríos</option>
                        </select>
                    </div>

                    <div class="col_one_third col_last">
                        <label for="template-contactform-service">Departamento</label>
                        <select id="template-contactform-dpto" name="template-contactform-dpto" class="sm-form-control">
                            <option value="">-- Seleccionar --</option>
                            <option value="Posadas">Capital-Posadas</option>
                            <option value="Apostoles">Apostóles</option>
                            <option value="Cainguás">Cainguás</option>
                            <option value="Candelaria">Candelaria</option>
                            <option value="Concepción">Concepción</option>
                            <option value="El dorado">Eldorado</option>
                            <option value="Guaraní">Guaraní</option>
                        </select>
                    </div>
                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="template-contactform-message">Como te gustaria ayudar a otro <small>*</small></label>
                        <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message"
                            rows="6" cols="30"></textarea>
                    </div>

                    <div class="col_full hidden">
                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck"
                            value="" class="sm-form-control" />
                    </div>

                    <div class="col_full">
                        <button class="button button-3d nomargin" type="submit" id="template-contactform-submit"
                            name="template-contactform-submit" value="submit">Enviar Mensaje</button>
                    </div>

                </form>

                <script type="text/javascript">
                    $("#template-contactform").validate({
                        submitHandler: function(form) {
                            $('.form-process').fadeIn();
                            $(form).ajaxSubmit({
                                target: '#contact-form-result',
                                success: function() {
                                    $('.form-process').fadeOut();
                                    $('#template-contactform').find('.sm-form-control').val('');
                                    $('#contact-form-result').attr('data-notify-msg', $('#contact-form-result')
                                        .html()).html('');
                                    SEMICOLON.widget.notifications($('#contact-form-result'));
                                }
                            });
                        }
                    });
                </script>

            </div><!-- .postcontent end -->

            <!-- Sidebar
                        ============================================= -->
            <div class="sidebar col_last nobottommargin">

                <address>
                    <strong>Oficina:</strong><br>
                    Calle xx nro xxx<br>
                    Posadas, Misiones -Argentina<br>
                </address>
                <abbr title="Phone Number"><strong>Teléfono:</strong></abbr> (54376) 1111 222222<br>
                <abbr title="Email"><strong>Email:</strong></abbr> info@somosotro.com.ar

                <div class="widget noborder notoppadding">

                    <a href="#" class="social-icon si-small si-dark si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-dark si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-dark si-youtube">
                        <i class="icon-youtube"></i>
                        <i class="icon-youtube"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-dark si-instagram">
                        <i class="icon-instagram"></i>
                        <i class="icon-instagram"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-dark si-pinterest">
                        <i class="icon-pinterest"></i>
                        <i class="icon-pinterest"></i>
                    </a>

                    <a href="#" class="social-icon si-small si-dark si-gplus">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>

                </div>

            </div><!-- .sidebar end -->

        </div>

        </div>

    </section><!-- #content end -->
@endsection
