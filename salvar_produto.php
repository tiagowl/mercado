<?php
    include_once 'model/clsProduto.php';
    include_once 'model/clsCategoria.php';
    
    
    function salvarFoto(){
        if ( isset( $_FILES['foto']['name'] ) &&
                $_FILES['foto']['name'] != "" ){
            
            $nome_arquivo= date("YmdHis").'_'
                    .basename($_FILES['foto']['name']);
            $diretorio = "fotos/";
            $arquivo = $diretorio.$nome_arquivo;
            if( move_uploaded_file( $_FILES['foto']['tmp_name'] ,
                    $arquivo ) ){
                return $nome_arquivo;
            }  else {
                return "sem_foto.png";
            }
        }  else {
            return "sem_foto.png";
        }
    }





    if( isset( $_REQUEST['inserir'])  ){
        $pro = new Produto();
        $pro->nome = $_POST['nome'];
        
        $preco = str_replace(",", ".", $_POST['preco']);
        $pro->preco = $preco;
        
        $qtd = str_replace(",", ".", $_POST['quantidade']);
        $pro->quantidade = $qtd;
        
        $perecivel = 0;
        if( isset( $_POST['perecivel'])){
            $perecivel = 1;
        }
        $pro->perecivel = $perecivel;
        
        
        $cat = new Categoria();
        $cat->id = $_POST['categoria'];
        
        $pro->categoria = $cat;
        
        $pro->foto = salvarFoto();
        
        $pro->inserir();
        
    }
    
    
    if( isset( $_REQUEST['excluir'] )  ){
        $prod = new Produto();
        $prod->id = $_REQUEST['id'];
        $foto = $prod->getNomeFoto();
        if( $foto != "" && $foto != "sem_foto.png" ){
            $arquivo = "fotos/".$foto;
            if( unlink($arquivo) )
                 $prod->excluir();
        }  else {
            $prod->excluir();
        } 
    }
    
    if( isset($_REQUEST['editar'])){
        $produto = new Produto();
        $produto->id = $_REQUEST['id'];
        $produto->nome = $_POST['nome'];
        
        $produto->preco = str_replace(",", ".", $_POST['preco']);
        $produto->quantidade = str_replace(",", ".", $_POST['quantidade']);
        $perecivel = 0;
        if( isset( $_POST['perecivel'])){
            $perecivel = 1;
        }
        $produto->perecivel = $perecivel;
        
        $cat = new Categoria();
        $cat->id = $_POST['categoria'];
        $produto->categoria = $cat;
        
        $foto = $produto->getNomeFoto();
        
        if ( isset( $_FILES['foto']['name'] ) &&
                $_FILES['foto']['name'] != "" ){
        
            if( $foto != "" && $foto != "sem_foto.png" ){
                $arquivo = "fotos/".$foto;
                unlink($arquivo);      
            } 

            $produto->foto = salvarFoto();
        }  else {
            $produto->foto = $foto;
        }
        
        $produto->editar();
    }
    
   //  header("Location: produtos.php");
?>
 <a href="produtos.php">Listar Produtos</a>  




