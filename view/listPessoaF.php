<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$pfs = $_REQUEST['pfs'];
$pessoasFBD = $_REQUEST['pfsBD'];
$pfsdb = new cPessoaF();        
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lista Pessoas Físicas</h1>
        <a href="../index.php">Voltar</a>
        <table>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Sexo</th>
            </tr>
            <!--
            <?php
            foreach ($pfs as $pf):
                ?>
                                <tr>
                                   <td><?php //echo $pf->getNome();     ?></td>
                                    <td><?php //echo $pf->getCPF();     ?></td>
                                    <td><?php
                if ($pf->getSexo() == "F") {
                    //   echo "Feminino";
                } else {
                    //  echo "Masculino";
                }
                ?>
                                    </td>
                                </tr>
            <?php endforeach; ?>
            -->

            <?php
            if ($pessoasFBD == null) {
                echo "Tabela vazia.";
            } else {
                foreach ($pessoasFBD as $pf):
                    ?>
                    <tr>
                        <td><?php echo $pf['nome']; ?></td>
                        <td><?php echo $pf['cpf']; ?></td>
                        <td><?php
                            if ($pf['sexo'] == "F") {
                                echo "Feminino";
                            } else {
                                echo "Masculino";
                            }
                            ?>
                        </td>
                        <td>
                            <form action="editPessoaF.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pf['idPessoa']; ?> " />
                                <input type="submit" name="update" value="Editar"/>
                            </form>
                            <form action="<?php $pfsdb->funcoes(); ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pf['idPessoa']; ?> " />
                                <input type="submit" name="delete" value="Deletar"/>
                            </form>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </table>

    </body>
</html>
