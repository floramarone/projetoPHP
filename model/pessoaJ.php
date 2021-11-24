<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pessoaJ
 *
 * @author flora
 */
require_once 'pessoa.php';
class pessoaJ extends pessoa{
    //put your code here
    private $cnpj;
    private $nomeFantasia;
    
    public function pessoaJ(){
        
    }
    public function getCnpj() {
        return $this->cnpj;
    }

    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function setCnpj($cnpj): void {
        $this->cnpj = $cnpj;
    }

    public function setNomeFantasia($nomeFantasia): void {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function __toString() {
        $pes = '- Nome: ' . $this->getNome() . '<br>'
                . ' - Telefone: ' . $this->getTelefone() . '<br>'
                . ' - Email: ' . $this->getEmail() . '<br>'
                . ' - Endereço: ' . $this->getEndereco() . '<br>'
                . ' - CNPJ: ' . $this->getCnpj() . '<br>'
                . ' - Nome Fantasia: ' . $this->getNomeFantasia() . '<br><br>';
        return $pes;
    }

}
