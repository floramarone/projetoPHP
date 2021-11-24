<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPessoaJ
 *
 * @author flora
 */
require_once '../model/pessoaJ.php';

class cPessoaJ {

    //put your code here
    private $pj = [];

    public function __construct() {
        $this->mokPJ();
    }

    public function mokPJ() {
        $pj1 = new pessoaJ();
        $pj1->setNome('Senac');
        $pj1->setTelefone(555555555);
        $pj1->setEmail('email@senac.com');
        $pj1->setEndereco('venancio aires');
        $pj1->setCnpj(4656554546);
        $pj1->setNomeFantasia('Senac Tech');
        $this->addPessoaJ($pj1);

        $pj2 = new pessoaJ();
        $pj2->setNome('WallMart');
        $pj2->setTelefone(000000000);
        $pj2->setEmail('email@big.com');
        $pj2->setEndereco('sertorio');
        $pj2->setCnpj(779879879);
        $pj2->setNomeFantasia('BIG');
        $this->addPessoaJ($pj2);
    }

    public function getAllPJ() {

        $_REQUEST['pjs'] = $this->pj;

        $this->getAllBDJ();

        require_once '../view/listPessoaJ.php';
    }

    public function addPessoaJ($p) {
        array_push($this->pj, $p);
    }

    public function imprimePJ() {
        foreach ($this->pj as $pj) {
            echo $pj;
        }
    }

    public function inserirBDJ() {
        if (isset($_POST['salvarPJ'])) {
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
            $Cnpj = $_POST['cnpj'];
            $NomeFantasia = $_POST['nomeFantasia'];

            $sql = "insert into `pessoa` (`nome`, `telefone`, `email`, `endereco`, `cnpj`, `nomeFantasia`) "
                    . "values ('$Nome', '$Telefone', '$Email', '$Endereco', '$Cnpj', '$NomeFantasia')";

            $result = mysqli_query($conexao, $sql);

            if (!$result) {
                die("Erro ao inserir. " . mysqli_error($conexao));
            }
            mysqli_close($conexao);
        }
    }

    public function getAllBDJ() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'dev3n201';
        $conexao = mysqli_connect($host, $user, $pass, $schema);

        if (!$conexao) {
            die("Erro ao conectar. " . mysqli_error($conexao));
        }

        $sql = "select * from pessoa where cpf is null";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            $pjsBD = [];

            while ($row = $result->fetch_assoc()) {
                array_push($pjsBD, $row);
            }
            $_REQUEST['pjsBD'] = $pjsBD;
        } else {
            $_REQUEST['pjsBD'] = 0;
        }
        mysqli_close($conexao);
    }

    public function deletePJ() {
        //DELETAR PESSOA
        if (isset($_POST['deletePJ'])) {
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
    
    public function getPessoaJById($id) {
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
            $pjsBD = [];

            while ($row = $result->fetch_assoc()) {
                array_push($pjsBD, $row);
            }
            return $pjsBD;
        }
        mysqli_close($conexao);
        
    }
    
    public function updatePJ() {
        if(isset($_POST['salvarPJ'])){
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
            $Cnpj = $_POST['cnpj'];
            $NomeFantasia = $_POST['nomeFantasia'];
            
            $sql = "UPDATE `pessoa` SET `nome`='$Nome',`telefone`='$Telefone',"
                    . "`email`='$Email',`endereco`='$Endereco',`cnpj`='$Cnpj',"
                    . "`nomeFantasia`='$NomeFantasia' WHERE `idPessoa`='$idPessoa'";
            $result = mysqli_query($conexao, $sql);
            if(!$result){
                die("Erro ao atualizar pessoa." . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Location: ../view/gerPessoaJ.php');
        }
        if(isset($_POST['cancelar'])){
            header('Location: ../view/gerPessoaJ.php');
        }
    }

}
