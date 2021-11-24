<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPessoaF
 *
 * @author flora
 */
require_once '../model/pessoaF.php';

class cPessoaF {

    //put your code here
    private $pf = [];

    public function __construct() {
        $this->mokPF();
    }

    public function mokPF() {
        $pf1 = new pessoaF();
        $pf1->setNome('flora');
        $pf1->setTelefone(9999999999);
        $pf1->setEmail('flora@email.com');
        $pf1->setEndereco('rua xyz');
        $pf1->setCpf('xxxxx');
        $pf1->setSexo('F');
        $this->addPessoaF($pf1);

        $pf2 = new pessoaF();
        $pf2->setNome('jair');
        $pf2->setTelefone('00000000');
        $pf2->setEmail('jair@email.com');
        $pf2->setEndereco('rua abc');
        $pf2->setCpf('yyyyy');
        $pf2->setSexo('M');
        $this->addPessoaF($pf2);
    }

    public function getAllPF() {
        // return $this->pf;
        $_REQUEST['pfs'] = $this->pf;

        $this->getAllBD();

        require_once '../view/listPessoaF.php';
    }

    public function imprime() {
        foreach ($this->pf as $pf):
            echo $pf;
        endforeach;
    }

    public function addPessoaF($p) {
        array_push($this->pf, $p);
    }

    public function inserir() {
        if (isset($_POST['salvarPF'])) {
            $pf = new pessoaF();
            $pf->setNome($_POST['nome']);
            $pf->setTelefone($_POST['tel']);
            $pf->setEmail($_POST['email']);
            $pf->setEndereco($_POST['endereco']);
            $pf->setCpf($_POST['cpf']);
            $pf->setSexo($_POST['sexo']);
            $this->addPessoaF($pf);
        }
    }

    public function inserirBD() {
        if (isset($_POST['salvarPF'])) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'dev3n201';
            $conexao = mysqli_connect($host, $user, $pass, $schema);

            if (!$conexao) {
                die("Erro ao conectar. " . mysqli_error($conexao));
            }

            $Nome = $_POST['nome'];
            $Telefone = $_POST['tel'];
            $Email = $_POST['email'];
            $Endereco = $_POST['endereco'];
            $Cpf = $_POST['cpf'];
            $Sexo = $_POST['sexo'];

            $sql = "insert into `pessoa` (`nome`, `telefone`, `email`, `endereco`, `cpf`, `sexo`) "
                    . "values ('$Nome', '$Telefone', '$Email', '$Endereco', '$Cpf', '$Sexo')";

            $result = mysqli_query($conexao, $sql);

            if (!$result) {
                die("Erro ao inserir. " . mysqli_error($conexao));
            }
            mysqli_close($conexao);
        }
    }

    public function getAllBD() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'dev3n201';
        $conexao = mysqli_connect($host, $user, $pass, $schema);

        if (!$conexao) {
            die("Erro ao conectar. " . mysqli_error($conexao));
        }

        $sql = "select * from pessoa where cnpj is null";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            $pfsBD = [];

            while ($row = $result->fetch_assoc()) {
                array_push($pfsBD, $row);
            }
            $_REQUEST['pfsBD'] = $pfsBD;
        } else {
            $_REQUEST['pfsBD'] = 0;
        }
        mysqli_close($conexao);
    }

    public function funcoes() {
        //DELETAR PESSOA
        if (isset($_POST['delete'])) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'dev3n201';
            $conexao = mysqli_connect($host, $user, $pass, $schema);

            if (!$conexao) {
                die("Erro ao conectar. " . mysqli_error($conexao));
            }
            $id = $_POST['id'];
            $sql = "delete from pessoa where idPessoa = $id";
            $result = mysqli_query($conexao, $sql);
            if (!result) {
                die("Erro ao deletar. " . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Refresh: 0');  //recarregar a página
        }
    }

    public function getPessoaById($id) {
        //ATUALIZAR PESSOA

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'dev3n201';
        $conexao = mysqli_connect($host, $user, $pass, $schema);

        if (!$conexao) {
            die("Erro ao conectar. " . mysqli_error($conexao));
        }

        $sql = "select * from pessoa where idPessoa=$id";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            $pfsBD = [];

            while ($row = $result->fetch_assoc()) {
                array_push($pfsBD, $row);
            }
            return $pfsBD;
        }
        mysqli_close($conexao);
        
    }
    
    public function update() {
        if(isset($_POST['updatePF'])){
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'dev3n201';
            $conexao = mysqli_connect($host, $user, $pass, $schema);

            if (!$conexao) {
                die("Erro ao conectar. " . mysqli_error($conexao));
            }
            $idPessoa = $_POST['idPessoa'];
            $Nome = $_POST['nome'];
            $Telefone = $_POST['tel'];
            $Email = $_POST['email'];
            $Endereco = $_POST['endereco'];
            $Cpf = $_POST['cpf'];
            $Sexo = $_POST['sexo'];
            
            $sql = "UPDATE `pessoa` SET `nome`='$Nome',`telefone`='$Telefone',"
                    . "`email`='$Email',`endereco`='$Endereco',`cpf`='$Cpf',"
                    . "`sexo`='$Sexo' WHERE `idPessoa`='$idPessoa'";
            $result = mysqli_query($conexao, $sql);
            if(!$result){
                die("Erro ao atualizar pessoa." . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Location: ../view/gerPessoaF.php');
        }
        if(isset($_POST['cancelar'])){
            header('Location: ../view/gerPessoaF.php');
        }
    }
}
