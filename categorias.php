<?php

    session_start();
    
    if( isset( $_SESSION['logado'] ) && 
            $_SESSION['logado'] == TRUE ) {

        

    $id = 0;
    $nome = "";
    $action = "inserir";
    
    if( isset($_REQUEST['editar']) ){
        $id = $_REQUEST['id'];
        $nome = $_REQUEST['nome'];
        $action = "editar&id=".$id;
    }
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
        
        include_once 'model/clsCategoria.php';
        
        require 'menu.php';
        
        echo '<h1>Categorias</h1>';
        ?>
        
        <form action="salvar_categoria.php?<?php echo $action; ?>" method="POST">
            <label>Nome: </label>
            <input type="text" name="nome" id="txtNome" value="<?php echo $nome; ?>" required />
            <input type="submit" value="Salvar" id="btnSalvar" />
        </form>
        <hr>
        <br><br>
        <table border="1" id="tblCategorias" >
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php
                $lista = Categoria::listar();
                $cont = 0;
                foreach ($lista as $cat) {
                    $cont++;
                    echo '<tr id="linha'.$cont.'" >';
                    echo '    <td>'.$cat->id.'</td>';
                    echo '    <td>'.$cat->nome.'</td>';
                    echo '    <td> 
                                  <a href="?editar&id='.$cat->id.'&nome='.$cat->nome.'" >
                                      <button id="btnEditar'.$cont.'" >Editar</button>
                                  </a>   
                              </td>';
                    
                    echo '    <td> 
                                  <a href="salvar_categoria.php?excluir&id='.$cat->id.'" >
                                      <button id="btnExcluir'.$cont.'" >Excluir</button>
                                  </a>   
                              </td>';
                    
                    
                    
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
