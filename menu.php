<div id="menu" >
    
    <a href="index.php"><button id="btnInicio" >Início</button></a>
    <a href="produtos.php"><button id="btnProdutos" >Produtos</button></a>
    <a href="carrinho.php"><button id="btnCarrinho" >Carrinho</button></a>
    
    <?php
        if ( session_status() != PHP_SESSION_ACTIVE ){
            session_start();
        }
        
        if( isset( $_SESSION['logado'] ) && 
                $_SESSION['logado'] == TRUE ) { 
    ?>
    <a href="categorias.php"><button id="btnCategorias" >Categorias</button></a>
    <a href="clientes.php"><button id="btnClientes" >Clientes</button></a>
    <a href="pedidos.php"><button id="btnPedidos" >Pedidos</button></a>
    <a href="sair.php"><button id="btnSair" >Sair</button></a>
    <?php
            echo 'Olá,seja bem-vindo <label id="nome_logado">  '.$_SESSION['nomeCliente'].'</label>';
            
        }  else {
    ?>
    
    <a href="#login" ><button>Log In</button></a>
    
    <div id="login" class="modal" >
        <div  >
            <a href="#fechar" class="fechar" >X</a>
            <form action="login.php" method="POST">
                <input type="text" name="login" id="txtLogin" 
                       placeholder="Login: " />
                <input type="password" name="senha" id="txtSenha"
                       placeholder="Senha: " />
                <input type="submit" value="Entrar" id="btnEntrar" />

            </form>
        </div>    
    </div>
    <?php
        }
    ?>
    
    
</div>
