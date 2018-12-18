<?php
    include_once 'model/clsCliente.php';
    include_once 'model/clsCategoria.php';
    
    
    function salvarFoto(){
        if ( isset( $_FILES['foto']['name']) && $_FILES['foto']['name'] != "" ){
            
            $nome_arquivo=date("YmdHis").'_'.basename($_FILES['foto']['name']);
            $diretorio = "fotos/";
            
            $arquivo = $diretorio.$nome_arquivo;
            
            if( move_uploaded_file( $_FILES['foto']['tmp_name'],$arquivo) ){
                
                return $nome_arquivo;                
                
            } else {
                return "sem_foto.png";
            }
            
            
        }else {                      
            
            return "sem_foto.png";
        }
        
    }



    if( isset( $_REQUEST['inserir']) ){
        $cli = new Cliente();
        $cli->nome = $_POST['nome'];
        $cpf = str_replace(",", ".", $_POST['cpf']);
        
        $cli->cpf = $cpf;
        
        $cli->email = $email;      
        
        $cli->endereco = $endereco;
        
        //$cli->receberEmail; 
        
        $cli->foto = salvarFoto();
        
        $cli->senha = $senha;
        
        $cli->inserir();        
        
    }
    
    if( isset( $_REQUEST['excluir'])){
        $prod = new Produto();
        $prod->id = $_REQUEST['id'];
        $foto = $prod->getNomeFoto();
        if( $foto != "" && $foto != "sem_foto.png" ){
            $arquivo = "fotos/".$foto;
            if( unlink($arquivo))
                $prod->excluir ();
            
        } else {
            $prod->excluir();
        }
        
    }
    
    if( isset($_REQUEST['editar'])){
        $produto = new Produto();
        $produto->id = $_REQUEST['id'];
        if ( isset( $_FILES['foto']['name']) && $_FILES['foto']['name'] != "" ){
        
            if( $foto != "" && $foto != "sem_foto.png" ){
                $arquivo = "fotos/".$foto;
                 unlink($arquivo);
                           
            }
        
            $cliente->foto = salvarFoto();
        } else{
            $cliente->foto = $foto;
            
        }
        $cliente->nome = $_POST['nome'];
        
        $cliente->cpf = str_replace(",", ".", $_POST['cpf']);
        $cliente->email = str_replace(",", ".", $_POST['email']);
                       
        
        $cat = new Categoria();
        $cat->id = $_POST['categoria'];
        $produto->categoria = $cat;  
        
        
        $foto = $produto->getNomeFoto();
        
        if ( isset( $_FILES['foto']['name']) && $_FILES['foto']['name'] != "" ){
        
            if( $foto != "" && $foto != "sem_foto.png" ){
                $arquivo = "fotos/".$foto;
                 unlink($arquivo);
                           
            }
        
            $produto->foto = salvarFoto();
        } else{
            $produto->foto = $foto;
            
        }
        
        $produto->editar();
    }
    
    header("Location: clientes.php");
    ?>

