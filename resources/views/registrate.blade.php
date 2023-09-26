@extends('layouts.canvas')

@section('content')
    <!-- Content
            ============================================= -->

    <section id="content">

        <div class="container clearfix">
            <h3>Elige tu AVATAR</h3>

            <ul class="clients-grid grid-4 nobottommargin clearfix">
                <li><a href="#"><img src="images/yaguarete.jpg" alt="Yaguareté"></a></li>
                <li><a href="#"><img src="images/coati.jpg" alt="Coati"></a></li>
                <li><a href="#"><img src="images/pecari.jpg" alt="Pecari"></a></li>
                <li><a href="#"><img src="images/surubi.jpg" alt="Surubi"></a></li>
            </ul>


            <!-- Formulario
                        ============================================= -->

            <h4>Completá los siguientes datos</h4>

            <div id="contact-form-result" data-notify-type="success"
                data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

            <form class="nobottommargin" id="template-contactform" name="template-contactform"
                action="include/sendemail.php" method="post">

                <div class="form-process"></div>

                <div class="col_half">
                    <label for="template-contactform-service">SOY</label>
                    <select id="template-contactform-provincia" name="template-contactform-provincia"
                        class="sm-form-control">
                        <option value="">-- seleccionar --</option>
                        <option value="hombre">hombre</option>
                        <option value="mujer">mujer</option>
                        <option value="no binario">no binario</option>
                        <option value="sin determinar">prefiero no decirlo</option>
                    </select>
                </div>
                <div class="col_half col_last">
                    <label for="template-contactform-phone">Nací (dd/mm/yyyy)</label>
                    <input type="text" id="template-contactform-birth" name="template-contactform-birth" value=""
                        class="sm-form-control" />
                </div>

                <div class="col_half">
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

                <div class="col_half col_last">
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

                <div class="col_half">
                    <label for="template-contactform-name">Como te gustaría que te llamemos <small>*</small></label>
                    <input type="text" id="template-contactform-name" name="template-contactform-name" value=""
                        class="sm-form-control required" />
                </div>
                <div class="col_half col_last">
                    <label for="template-contactform-email">Email <small>*</small></label>
                    <input type="email" id="template-contactform-email" name="template-contactform-email" value=""
                        class="required email sm-form-control" />
                </div>

                <div class="clear"></div>

                <div class="col_full hidden">
                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck"
                        value="" class="sm-form-control" />
                </div>

                <div class="col_full">
                    <button class="button button-3d nomargin" type="submit" id="template-contactform-submit"
                        name="template-contactform-submit" value="submit">Registrarme</button>
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



        </div>

        </div>

    </section><!-- #content end -->
@endsection
