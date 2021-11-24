<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$idPessoaf = 0;
if(isset($_POST['update'])){
    $idPessoaf = $_POST['id'];
}
require_once '../controller/cPessoaF.php';
$pfBD = new cPessoaF();
$pesUp = $pfBD->getPessoaById($idPessoaf);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar PF</title>
    </head>
    <body>
        <h3>Editar Pessoa Física</h3>
        
        <form method="POST" action="<?php  $pfBD->update(); ?>" >
            <input type="hidden" name="idPessoa" value="<?php echo $pesUp[0]['idPessoa']; ?>" />
            <input type="text" name="nome" required value="<?php echo $pesUp[0]['nome'];?>">
            <br><br>
            <input type="text" name="tel" required value="<?php echo $pesUp[0]['telefone'];?>">
            <br><br>
            <input type="text" name="email" required value="<?php echo $pesUp[0]['email'];?>">
            <br><br>
            <input type="text" name="endereco" required value="<?php echo $pesUp[0]['endereco'];?>">
            <br><br>
            <input type="text" name="cpf" required value="<?php echo $pesUp[0]['cpf'];?>">
            <br><br>
            <input type="radio" name="sexo" required 
                   <?php if($pesUp[0]['sexo']=="F"){echo "checked";} ?>
                   value="F" >Feminino
            <input type="radio" name="sexo" required
                   <?php if($pesUp[0]['sexo']=="M"){echo "checked";} ?>
                   value="M" >Masculino
           
            <br><br>
            <input type="submit" name="updatePF" value="Salvar Alterações" >                
            <input type="submit" name="cancelar" value="Cancelar" >                
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
