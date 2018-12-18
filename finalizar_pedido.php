<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require 'menu.php';
            
            echo '<h1>Finalizar Pedido</h1> <br> <br>';
            
            if( isset($_SESSION['logado']) && 
                    $_SESSION['logado'] == TRUE ){
                echo '<form action="salvar_pedido.php" method="POST">';
                echo '    <label>Forma de Pagamento: </label>'; 
                echo '    <select name="pagamento" >';       
                echo '       <option value="0">Selecione...</option>';
                echo '       <option value="dinheiro">Dinheiro</option>';
                echo '       <option value="cheque">Cheque</option>';
                echo '       <option value="debito">Cartão de Débito</option>';
                echo '       <option value="credito">Cartão de Crédito</option>';
                echo '       <option value="tri">TRI</option>';
                echo '       <option value="teu">TEU</option>';
                echo '    </select>';
                echo '    <input type="submit" value="Finalizar" />';
                
                echo '</form>';
                
            }  else {
                echo '<h3>Você deve efetuar seu login
                          para poder finalizar seu pedido</h3>';
            }
            
            
                
            
            require 'rodape.php';
            
        ?>
    </body>
</html>
