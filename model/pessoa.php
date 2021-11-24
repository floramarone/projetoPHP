<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pessoa
 *
 * @author flora
 */

class pessoa {
    //put your code here
    private $nome;
    private $telefone;
    private $email;
    private $endereco;
    
    public function pessoa() {
           
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setEndereco($endereco): void {
        $this->endereco = $endereco;
    }



}
