<?php
session_start();


if (isset($_REQUEST['adicionar'])) {
    $id = $_REQUEST['id'];
    if (isset($_SESSION['carrinho'][$id])) {
        if(isset($POST[qtd]))
        $_SESSION['carrinho'][$id] += $POST['qtd']; 
        else
        $_SESSION['carrinho'][$id] ++;
    } else {
        
        if(isset($POST[qtd]))
        $_SESSION['carrinho'][$id] += $POST['qtd']; 
        else
        $_SESSION['carrinho'][$id] ++;
    }
    header("Location: carrinho.php");
} 

if (isset($_REQUEST['remover'])) {
    $id = $_REQUEST['id'];
    if ($_SESSION['carrinho'][$id] > 1) {
        $_SESSION['carrinho'][$id] --;
    } else {
        unset($_SESSION['carrinho'][$id]);
    }
     header("Location: carrinho.php");
} 

if (isset($_REQUEST['excluir'])) {
    $id = $_REQUEST['id'];
    unset($_SESSION['carrinho'][$id]);
    header("Location: carrinho.php");
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> </title>
        <link href="CSS/mercado.css" type="text/css" rel="stylesheet" 
    </head>
    <body>

<?php
    require 'menu.php';

    echo '<h1>Carrinho de compras</h1>';
    
    echo '<table border="2" >';
    echo '    <tr>';
    echo '        <th>Código</th>';
    echo '        <th>Foto</th>';
    echo '        <th>Nome</th>';
    echo '        <th>Quantidade</th>';
    echo '        <th>Preço Unitário</th>';
    echo '        <th>Subtotal</th>';
    echo '        <th>Excluir</th>';
    echo '    </tr>';
    
    
    if ( isset($_SESSION['carrinho']) && 
            count($_SESSION['carrinho']) > 0 ){
        
        $total = 0;
        foreach ($_SESSION['carrinho'] as $id => $qtd) {
            include_once 'model/clsProduto.php';
            $produto = Produto::getProdutoByID($id);
            $subtotal = $qtd * $produto->preco;
            $total = $total + $subtotal;
            echo '<tr>';
            echo '   <td>'.$produto->id.'</td>';
            echo '   <td> <img src="fotos/'.$produto->foto.'" width="70px" /></td>';
            echo '   <td>'.$produto->nome.'</td>';
            echo '   <td>'.$qtd.' &nbsp;
                         <a href="?adicionar&id='.$produto->id.'" ><button>+</button></a>
                         <a href="?remover&id='.$produto->id.'" ><button>-</button></a>
                     </td>';
            echo '   <td>'.$produto->preco.'</td>';
            echo '   <td>'.$subtotal.'</td>';
            echo '   <td><a href="?excluir&id='.$produto->id.'" ><button>Excluir</button></a></td>';
            echo '</tr>';
        }
        
        echo '<tr> 
                    <td colspan="3" > Total: </td>
                    <td colspan="4" > R$ '. number_format($total, 2 , ',' , '.' ) .' </td>
              </tr>';
        
    }  else {
        echo '<tr> 
                  <td colspan="7">Carrinho Vazio</td> 
              </tr>';
    }
    
    echo '</table>';
    
    echo '<hr>';
    
    echo '<a href="finalizar_pedido.php"> 
              <button>Finalizar Pedido</button>
          </a>';
    

    require 'rodape.php';
?>
    </body>
</html>
