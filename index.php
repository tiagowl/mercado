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
        
        <div id="div_index">
            
        </div>
       
        <?php
        require 'menu.php';
        
        include_once 'model/clsProduto.php';
        
        $lista = Produto::listar();
        $cont = 1;
        echo '<div class="linha">';
        foreach ($lista as $pro) {
    
            echo '<div class="produto" >';
            
            echo '  <img src="fotos/'.$pro->foto.'" width="100px"  />';
            echo '  <p class="nome_produto">'.$pro->nome.'</p>';
            echo '  <p class="preco_produto"> R$ '.$pro->preco.'</p>';
            echo '<a href="#add_'.$pro->id.'" ><button>Comprar</button></a>';
            
            
            echo '</div>';
            if($cont % 3 == 0 && $cont != $lista->count() ){
                echo '</div>';
                echo '<div class="linha" >';
            }
        $cont++;    
}
        echo '</div>';
        
        reset($lista);
        foreach ($lista as $pro) {
            echo '<div id="add_'.$pro->id.'" class="modal" >';
            
            
                echo '<div>';
                
                echo '<a href="#fechar" class="fechar">X</a>';
                
                    echo '<form method="POST" action="carrinho.php?adicionar&id='.$pro->id.'" >';
                    echo '<legend>Produto:'.$pro->nome.'</legend>';
                        echo '<input type="number" name="qtd" />';
                        echo '<input type="submit" value="adicionar ao carrinho" />';
                    
                    echo '</form>';

                echo '</div>';
                
            
            echo '</div>';
}
        
        require 'rodape.php';
        ?>
    </body>
</html>
