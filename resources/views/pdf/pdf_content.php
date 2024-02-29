<?php
// pdf_content.php
?>

<html>
    <body>

    <style>
            @page { margin-top: 50px; }
            header { position: fixed; top: -50px; left: 0px; right: 0px; height: 100px; text-align: center; }
            header h1 { margin: 10px 0; }
            ul {
                list-style: none;
            }
         </style>
        <header>
            <h1>ORDEN DEL DÍA</h1>
            <h3><?php echo date("d/m/Y", strtotime($fecha)) ?></h3>
        </header>
        <br />
        <br />

        <ul>

            <?php

                foreach ($orden_del_dia->temarioOrdenDia as $temario){
                    echo "<li><strong>" . $temario->orden . " "  . $temario->tema->titulo . ":</strong></li>";

                    $comisionAux=-1;
                    echo "<table style='width: 100%; font-size: 10px;'>";
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
                                echo "<td style='vertical-align: top; width: 15%;'>".$item->numero."</td><td style='vertical-align: top; width: 20%;'>".$item->facultad->name."</td><td style='vertical-align: top; width: 65%;'>".$item->resumen."</td>";
                                echo "</tr>";
                                $comisionAux = $item->comision->id;
                            }else{

                            }


                            }
                    echo "</table>";

                }

            ?>

        </ul>

    </body>
</html>
