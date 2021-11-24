<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
require_once '../controller/cPessoaJ.php';
        $cadPJs = new cPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Ger. Pessoa Jurídica</h1>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form method="POST" action="<?php $cadPJs->inserirBDJ(); ?>" >
            <input type="text" name="nome" required placeholder="Nome">
            <br><br>
            <input type="text" name="tel" required placeholder="Telefone">
            <br><br>
            <input type="text" name="email" required placeholder="Email">
            <br><br>
            <input type="text" name="end" required placeholder="Endereço">
            <br><br>
            <input type="text" name="cnpj" required placeholder="CPNJ">
            <br><br>
            <input type="text" name="nomeFantasia" required placeholder="Nome Fantasia">
           
            <br><br>
            <input type="submit" name="salvarPJ" placeholder="Salvar" >
            <input type="reset" name="limpar" placeholder="Limpar">
                
        </form>
        <?php
        
        $cadPJs->getAllPJ();
        ?>
    </body>
</html>
