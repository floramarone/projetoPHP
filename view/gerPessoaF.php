<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
require_once '../controller/cPessoaF.php';
        $cadPFs = new cPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ger PF</title>
    </head>
    <body>
        <h1>Ger. Pessoa Física</h1>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form method="POST" action="<?php $cadPFs->inserirBD(); ?>" >
            <input type="text" name="nome" required placeholder="Nome">
            <br><br>
            <input type="text" name="tel" required placeholder="Telefone">
            <br><br>
            <input type="text" name="email" required placeholder="Email">
            <br><br>
            <input type="text" name="endereco" required placeholder="Endereço">
            <br><br>
            <input type="text" name="cpf" required placeholder="CPF">
            <br><br>
            <input type="radio" name="sexo" required value="F" checked="true" >Feminino
            <input type="radio" name="sexo" required value="M">Masculino
           
            <br><br>
            <input type="submit" name="salvarPF" placeholder="Salvar" >
            <input type="reset" name="limpar" placeholder="Limpar">
                
        </form>
        <?php
        
        $cadPFs->getAllPF();
        ?>
    </body>
</html>
