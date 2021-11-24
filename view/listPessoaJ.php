<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$pjs = $_REQUEST['pjs'];
$pessoasJBD = $_REQUEST['pjsBD'];
$pjsdb = new cPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lista Pessoas Jurídicas</h1>
        <a href="../index.php">Voltar</a>
        <table>
            <tr>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Nome Fantasia</th>
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
            if ($pessoasJBD == null) {
                echo "Tabela vazia.";
            } else {
                foreach ($pessoasJBD as $pj):
                    ?>
                    <tr>
                        <td><?php echo $pj['nome']; ?></td>
                        <td><?php echo $pj['cnpj']; ?></td>
                        <td><?php echo $pj['nomeFantasia']; ?></td>
                        
                       <td>
                            <form action="editPessoaJ.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pj['idPessoa']; ?> " />
                                <input type="submit" name="editarPJ" value="Editar"/>
                            </form>
                            <form action="<?php $pjsdb->deletePJ(); ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pj['idPessoa']; ?> " />
                                <input type="submit" name="deletePJ" value="Deletar"/>
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
