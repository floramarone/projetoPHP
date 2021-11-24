<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$idPessoaJ = 0;
if(isset($_POST['editarPJ'])){
    $idPessoaJ = $_POST['id'];
}
require_once '../controller/cPessoaJ.php';
$pjBD = new cPessoaJ();
$pesUp = $pjBD->getPessoaJById($idPessoaJ);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar PJ</title>
    </head>
    <body>
        <h3>Editar Pessoa Jurídica</h3>
        
        <form method="POST" action="<?php  $pjBD->updatePJ(); ?>" >
            <input type="hidden" name="idPessoa" value="<?php echo $pesUp[0]['idPessoa']; ?>" />
            <input type="text" name="nome" required value="<?php echo $pesUp[0]['nome'];?>">
            <br><br>
            <input type="text" name="tel" required value="<?php echo $pesUp[0]['telefone'];?>">
            <br><br>
            <input type="text" name="email" required value="<?php echo $pesUp[0]['email'];?>">
            <br><br>
            <input type="text" name="endereco" required value="<?php echo $pesUp[0]['endereco'];?>">
            <br><br>
            <input type="text" name="cnpj" required value="<?php echo $pesUp[0]['cnpj'];?>">
            <br><br>
            <input type="text" name="nomeFantasia" required value="<?php echo $pesUp[0]['nomeFantasia'];?>">
            
           
            <br><br>
            <input type="submit" name="salvarPJ" value="Salvar Alterações" >                
            <input type="submit" name="cancelar" value="Cancelar" >                
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
