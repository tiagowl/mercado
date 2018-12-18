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
        
        echo '<h1 id = "titulo" >Itens do Pedido</h1>';
        ?>
        <table border="1" id="tblItens" >
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            
            <?php
                include_once 'model/clsItem.php';
                include_once 'model/clsProduto.php';
                
                $lista = Item::listar( $_REQUEST['idPedido'] );
                $cont = 0;
                foreach ($lista as $item) {
                    $cont ++;
                    echo '<tr id="linha'.$cont.'" >';
                    echo '    <td>'.$item->produto->id.'</td>' ;
                    echo '    <td> 
                                 <img src="fotos/'.$item->produto->foto.'" /> 
                              </td>' ;
                    echo '    <td>'.$item->preco.'</td>' ;
                    echo '    <td>'.$item->quantidade.'</td>' ;
                    $subtotal = $item->preco * $item->quantidade ;
                    echo '    <td>'.$subtotal.'</td>' ;
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