<?php

    class Conexao{
        protected $conexao;

        public function __construct(){
            $this->conexao = new PDO("mysql:host=localhost; dbname=envativo", "root","");
        }

        public function getConexao(){
            return $this->conexao;
        }
    }

?>