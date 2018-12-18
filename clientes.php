<?php

    session_start();
    
    if( isset( $_SESSION['logado'] ) && 
            $_SESSION['logado'] == TRUE ) {
        
 ?>


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
        
        echo '<h1 id = "titulo" >Clientes</h1>';
        ?>
        <a href="frm_cliente.php">
            <button>Cadastrar Novo Cliente</button>
        </a>
        <table border="1" id="tblCliente" >
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Endereço</th>
                <th>CPF</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
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