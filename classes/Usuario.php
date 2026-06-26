<?php

    class Usuario{
        private $conn;
        private $table_name = "usuarios";

        public $id;
        public $nome;
        public $email;
        public $telefone;

        public function __construct($db){
            $this->conn = $db;
        }

        public function cadastrar(){

            $query = "INSERT INTO " . $this->table_name . "(nome, email, telefone) VALUES (:nome, :email, :telefone)";

            $stmt = $this->conn->prepare($query);

            return $stmt->execute([
                ":nome" => $this->nome,
                ":email" => $this->email,
                ":telefone" => $this->telefone
            ]);

        }

    }