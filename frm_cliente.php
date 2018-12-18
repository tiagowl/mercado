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
    </head>
    <body>
        <?php
            require 'menu.php';
        ?>
        
        <h1 id="titulo" >Cadastro de Cliente</h1>
        <!-- Comentário   -->
        <form method="POST" action="salvar_cliente.php?acao=inserir">
            <label>Nome: </label>
            <input type="text" name="nome" id="txtNome" required 
                   placeholder="Digite seu nome: "/> <br>
            
            <label>E-mail: </label>
            <input type="email" name="email" id="txtEmail" required 
                   placeholder="exemplo@exemplo.com "/>
            
            <input type="checkbox" name="receber" id="cbEmail" checked />
            <label>Aceito receber e-mail</label>
            <br>
            
            <label>Endereço: </label>
            <input type="text" name="endereco" id="txtEndereco" 
                   placeholder="Rua Silva, 123 Ap. 205 "/> <br>
            
            <label>CPF:</label>
            <input type="text" name="cpf" id="txtCpf" required maxlength="15" 
                   placeholder="111.222.333-44 "/> <br>
            
            <label>Foto:</label>
            <input type="file" name="foto" id="fileFoto" /> <br>
            
            <label>Senha:</label>
            <input type="password" name="senha" id="pdSenha" required  
                   placeholder="Digite sua senha:"/> <br>
            
            <label>Repita sua Senha:</label>
            <input type="password" name="senha2" id="pdRepetirSenha" required size="25" 
                   placeholder="Digite novamente sua senha:"/> <br>
            
            <input type="submit" value="Salvar" id="btnSalvar" />
            <input type="reset"  value="Limpar" id="btnLimpar" />
            
        </form>
        
        
        
        <?php
            require 'rodape.php';
        ?>
        
    </body>
</html>
