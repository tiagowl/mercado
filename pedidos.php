<?php

    session_start();
    
    if( isset( $_SESSION['logado'] ) && 
            $_SESSION['logado'] == TRUE ) {

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="CSS/mercado.css" type="text/css" rel="stylesheet" 
    </head>
    <body>
        <?php
        require 'menu.php';
        
        echo '<h1 id="titulo" >Pedidos</h1>';
        ?>
        <table border="1" id="tblPedidos" >
            <tr>
                <th>Id</th>
                <th>Data</th>
                <th>Forma de Pagamento</th>
                <th>Cliente</th>
                <th>Abrir</th>
                <th>Excluir</th>
            </tr>
            
            <?php
                include_once 'model/clsPedido.php';
                include_once 'model/clsCliente.php';
                
                $lista = Pedido::listar();
                $cont = 0;
                foreach ($lista as $ped) {
                    $cont ++;
                    echo '<tr id="linha'.$cont.'" >';
                    echo '    <td>'.$ped->id.'</td>' ;
                    echo '    <td>'.$ped->data.'</td>' ;
                    echo '    <td>'.$ped->formaPagamento.'</td>' ;
                    echo '    <td>'.$ped->cliente->nome.'</td>' ;
                    echo '    <td>
                                    <a href="itens.php?idPedido='.$ped->id.'">
                                        <button id="btnAbrir'.$cont.'" >Abrir</button>
                                    </a>
                              </td>' ;
                    echo '    <td> </td>';
                    echo '</tr>';
                }
                
            ?>
        </table>
        <?php
        require 'rodape.php';
        ?>
    </body>
</html>

<?php

    }  else {
        header("Location: index.php");
                
    }