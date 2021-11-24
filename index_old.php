<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php

    function show($a) {
        ?>
        <a href="https://www.<?php echo $a ?>.com.br" target="blank"><?php echo $a ?></a>
        <?php
    }
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Primeiro Projeto</title>
    </head>
    <body>
        <table> <!-- cria tabela -->
            <tr> <!-- cria linha -->
                <td> <!-- cria coluna -->

                    <h1>Primeiro projeto php</h1>
                    <h2>Turma DEV3N201</h2>

                    <?php
                    // put your code here
                    $valor = 3;
                    $divisor = 2;
                    $resultado = $valor % $divisor; //% faz o mod ou modal

                    if ($resultado == 0) {
                        echo 'Valor ' . $valor . ' é Par!';
                    } else {
                        echo 'Valor ' . $valor . ' é Impar!';
                    }

                    echo '<br><br><hr><br>';
                    show('Google');
                    echo ' | ';
                    show('Terra');
                    echo ' | ';
                    show('Youtube');
                    echo '<br><br>';
                    ?>
                </td>
                <td>
                    

                    <h3>Form GET</h3>
                    <form method="GET">
                        <label>Nome: </label>
                        <input type="text" name="nome"/>
                        <br><br>
                        <label>Idade:  </label>
                        <input type="number" name="idade"/>
                        <br><br>
                        <input type="submit" value="Calcular" name="calc"/>
                        <input type="reset" value="Limpar" name="limpar" />
                    </form>
                </td>
                <td>

                    <h3>Form POST</h3>
                    <form method="POST">
                        <input type="text" name="nome" placeholder="Nome aqui..." />
                        <br><br>
                        <input type="number" name="idade" placeholder="Idade aqui..." />
                        <br><br>
                        <input type="submit" value="Calcular" name="calc"/>
                        <input type="reset" value="Limpar" name="limpar" />
                    </form>
                </td>
            </tr>
        </table>
        <?php
        require_once './controller/cPessoaF.php';
        require_once './controller/cPessoaJ.php';
        $cadPFs = new cPessoaF();
        $cadPJs = new cPessoaJ();
        
        $pf1 = new pessoaF();
        $pf1->setNome('Picasso');
        $pf1->setTelefone(8989898989) ;
        $pf1->setEmail('kkk@email.com');
        $pf1->setEndereco('rua andorinhas');
        $pf1->setCpf('aaaaaaa');
        $pf1->setSexo('F');
        $cadPFs->addPessoaF($pf1);
        
        $pj2 = new pessoaJ();
        $pj2->setNome('Grupo Zaffari');
        $pj2->setTelefone(3333333);
        $pj2->setEmail('email@zaffari.com');
        $pj2->setEndereco('sertorio');
        $pj2->setCnpj(10011033300);
        $pj2->setNomeFantasia('Stock Gravataí');
        $cadPJs->addPessoaJ($pj2);
        
        echo '<table><tr><td>';
        $cadPFs->imprime();
        echo '</td><td>';
        $cadPJs->imprimePJ();
        echo '</td></tr></table>'
        ?>
        <h3>Cadastro de PF</h3>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome">
            <br><br>
            <input type="text" name="tel" placeholder="Telefone">
            <br><br>
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="text" name="end" placeholder="Endereço">
            <br><br>
            <input type="text" name="cpf" placeholder="CPF">
            <br><br>
            <input type="text" name="sexo" placeholder="Sexo">
            <br><br>
            <input type="submit" name="salvaPF" placeholder="Salvar" >
            <input type="reset" name="limpar" placeholder="Limpar">
                
                
                
        </form>
        
    </body>
    <?php
    if (isset($_GET['calc'])) {
        $dias = $_GET['idade'] * 365;
        $msg = $_GET['nome'] . ' tem ' . $_GET['idade'] . ' anos e já viveu ' . $dias . ' dias aproximadamente.';
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }


    if (isset($_POST['calc'])) {
        $dias = $_POST['idade'] * 365;
        $msg = $_POST['nome'] . ' tem ' . $_POST['idade'] . ' anos e já viveu ' . $dias . ' dias aproximadamente.';
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    
    if(isset($_POST['salvaPF'])){
        $formPF = new pessoaF();
        $formPF->setNome($_POST['nome']);
        $formPF->setTelefone($_POST['tel']);
        $formPF->setEmail($_POST['email']);
        $formPF->setEndereco($_POST['end']);
        $formPF->setCpf($_POST['cpf']);
        $formPF->setSexo($_POST['sexo']);
        $cadPFs->addPessoaF($formPF);
        $cadPFs->imprime();
        
    }
    ?>
</html>
