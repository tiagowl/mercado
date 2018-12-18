<?php


    $nome = "";
    $preco = "";
    $quantidade = "";
    $categoria = 0;
    $perecivel = 0;
    $foto = "sem_foto.png";
    $action = "inserir";
    
    if( isset($_REQUEST['editar'])){
        
        include_once 'model/clsProduto.php';
        
        $id = $_REQUEST['id'];
        $action = "editar&id=".$id;
        
        $produto = Produto::getProdutoByID($id);
        
        $nome = $produto->nome;
        $preco = $produto->preco;
        $quantidade = $produto->quantidade;
        $perecivel = $produto->perecivel;
        $foto = $produto->foto;
        $categoria = $produto->categoria->id;
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require 'menu.php';
        ?>
        
        <h1 id="titulo" >Cadastro de Produto</h1>
        <!-- Comentário   -->
        <form method="POST" action="salvar_produto.php?<?php echo $action; ?>" 
              enctype="multipart/form-data" >
            
            <label>Nome: </label>
            <input type="text" name="nome" id="txtNome"  required 
                   value="<?php echo $nome; ?>"
                   placeholder="Digite nome do produto: "/> <br>
            
            <label>Preço: R$ </label>
            <input type="number" name="preco" id="txtPreco"  required step="any"
                   value="<?php echo $preco; ?>"
                   placeholder="0,00"/>
            <br>
            <?php
                $checado = "";
                if( $perecivel )
                    $checado = "checked";
            ?>
            <input type="checkbox" name="perecivel" id="cbPerecivel"
                <?php echo $checado; ?>    />
            <label>Produto Perecível</label>
            <br>
            
            <label>Quantidade: </label>
            <input type="number" name="quantidade" id="txtQuantidade" required step="any"
                   value="<?php echo $quantidade; ?>"
                   placeholder="0,00"/> <br>
            
            
            <label>Categoria:</label>
            <select name="categoria" id="cmbCategoria" >
                <option value="0" >Selecione...</option>
                <?php
                   include_once 'model/clsCategoria.php';
                   $lista = Categoria::listar();
                   
                   foreach ($lista as $cat) {
                       if( $cat->id == $categoria ){
                           echo '<option value="'.$cat->id.'" selected >'.$cat->nome.'</option>';
                       } else {
                           echo '<option value="'.$cat->id.'" >'.$cat->nome.'</option>';
                       }
                   }
                   
                
                
                ?>
            </select> <br>
            
            <label>Foto:</label>
            <?php
                if( isset($_REQUEST['editar']) ){
                    echo '<img src="fotos/'.$foto.'" width="70px" />';
                }
            ?>
            <input type="file" name="foto" /> <br>
                                   
            <input type="submit" value="Salvar" id="btnSalvar" />
            <input type="reset"  value="Limpar" id="btnLimpar" />
            
        </form>
        
        
        
        <?php
            require 'rodape.php';
        ?>
    </body>
</html>
