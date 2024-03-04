<?php
// pdf_content.php
?>

<html>


    <head>
        <style>
            @page { margin-top: 50px; }
            header { position: fixed; top: -50px; left: 0px; right: 0px; height: 100px; text-align: center; }
            header h2 { margin: 10px 0px 0px 0px; }
            h3 { margin-top: 0px;}
            ul {
                list-style: none;
            }


            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
            }

            h1 {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 24px;
                font-weight: bold;
            }

         </style>
    </head>

    <body>


        <header>
            <h2>ORDEN DEL DÍA</h2>
            <h3><?php echo date("d/m/Y", strtotime($fecha)) ?></h3>
        </header>
        <br />

        <ul>

            <?php

                foreach ($orden_del_dia->temariosOrdenDia as $temario){
                    echo "<br />";
                    echo "<li><strong>" . $temario->orden . " "  . $temario->tema->titulo . ":</strong></li>";

                    $comisionAux=-1;
                    echo "<table style='width: 100%; margin: 10px;'>";
                    echo "<colgroup>";
                    // echo "<col style='width: 10%;'>";
                    echo "<col style='width: 15%;'>";
                    echo "<col style='width: 25%;'>";
                    echo "<col style='width: 70%;'>";
                    echo "</colgroup>";

                        foreach($temario->items as $item){

                            if($item->comision){
                                if($item->comision->id != $comisionAux){
                                    echo "<tr>";
                                    echo "<td colspan='3'><h4>".$item->comision->name."</h4></td>";
                                    echo "</tr>";
                                }

                                echo "<tr>";
                                echo "<td style='vertical-align: top; width: 10%; padding-left: 20px'>".$item->numero."</td><td style='vertical-align: top; width: 15%;'>".$item->facultad->name."</td><td style='vertical-align: top; width: 65%; text-align: justify;'>".$item->resumen."</td>";
                                echo "</tr>";
                                $comisionAux = $item->comision->id;
                            }else{

                                if($item->numero){
                                    echo "<tr>";
                                    echo "<td style='vertical-align: top; width: 10%; padding-left: 20px'>".$item->numero."</td><td style='vertical-align: top; width: 15%;'>".$item->facultad->name."</td><td style='vertical-align: top; width: 65%; text-align: justify;'>".$item->resumen."</td>";
                                    echo "</tr>";
                                } else{
                                    echo "<tr>";
                                    echo "<td style='vertical-align: top; width: 15%; padding-left: 20px'>".$item->resolucion."</td><td colspan='2' style='vertical-align: top; width: 85%;'>".$item->resumen."</td>";
                                    echo "</tr>";

                                }

                            }

                            }
                    echo "</table>";

                }

            ?>

        </ul>

    </body>
</html>
