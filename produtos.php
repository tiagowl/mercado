<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="CSS/mercado.css" type="text/css" rel="stylesheet" 
    </head>
    <body>
        <?php
        require 'menu.php';
        
        echo '<h1>Produtos</h1>';
        ?>
        <a href="frm_produto.php">
            <button id="btnNovoProduto" >Cadastrar Novo Produto</button>
        </a>
        <table border="1" id="tblProdutos" >
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Perecível</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Excluir</th>
                <th>Comprar</th>
            </tr>
            
            <?php
                    include_once 'model/clsProduto.php';                                
                    
                    $lista = Produto::listar();
                    $cont = 0;
                    foreach ($lista as $prod ) {
                        $cont ++;
                        echo '<tr id="linha'.$cont.'" >';
                        echo '     <td>'.$prod->id.'</td>';
                        echo '     <td> <img src="fotos/'.$prod->foto.'" width="70px" /></td>';
                        echo '     <td>'.$prod->nome.'</td>';
                        echo '     <td>'.str_replace(".", ",", $prod->preco).'</td>';
                        echo '     <td>'.$prod->quantidade.'</td>';
                        
                        $perecivel = "Não";
                        if(  $prod->perecivel )
                            $perecivel = "Sim";
                        
                        echo '     <td>'.$perecivel.'</td>';
                        echo '     <td>'.$prod->categoria->nome.'</td>';
                        
                        $desabilitar = "disabled";
                        if( isset( $_SESSION['logado'] ) && 
                                   $_SESSION['logado'] == TRUE ) {
                            $desabilitar = "";
                        }               
                        echo '     <td> 
                                        <a href="frm_produto.php?editar&id='.$prod->id.'" >
                                            <button  '.$desabilitar.' id = "btnEditar'.$cont.'" >Editar</button>
                                        </a>
                                    </td>    ' ;
                        
                         echo ' <td> 
                                    <a href="salvar_produto.php?excluir&id='.$prod->id.'" >
                                        <button id = "btnExcluir'.$cont.'" '.$desabilitar.' >Excluir</button>
                                    </a>
                                 </td>    ' ;
                         
                         echo ' <td> 
                                    <a href="carrinho.php?adicionar&id='.$prod->id.'" >
                                        <button id = "btnComprar'.$cont.'" >Comprar</button>
                                    </a>
                                 </td>    ' ;
                        
                        echo '</tr>';
                    }
            
            ?>
        </table>
        
        
        <?php
        require 'rodape.php';
        ?>
    </body>
</html>
