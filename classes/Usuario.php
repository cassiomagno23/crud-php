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

        try{

            $query = "INSERT INTO " . $this->table_name . "(nome, email, telefone) VALUES (:nome, :email, :telefone)";

            $stmt = $this->conn->prepare($query);

            return $stmt->execute([
                ":nome" => $this->nome,
                ":email" => $this->email,
                ":telefone" => $this->telefone
            ]);

        }catch(PDOException $e){

            echo "Erro ao cadastrar usuário: " . $e->getMessage();

        }

            

        }

        public function listar(){

        try{
            
            $query = "SELECT id, nome, telefone, email FROM " . $this->table_name;

            $stmt_listar = $this->conn->prepare($query);

            $stmt_listar->execute();

            $lista = $stmt_listar->fetchAll(PDO::FETCH_ASSOC);

            return $lista;

        }catch(PDOException $e){
            
            die("Erro ao carregar a lista de usuário: " . $e->getMessage());

        }

        }

        public function deletar(){
            
            try{

                $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

                $stmt_deletar = $this->conn->prepare($query);

                $stmt_deletar->execute([
                    ":id" => $this->id
                ]);

                return true;

            }catch(PDOException $e){
                echo "O usuário não pode ser deletado: " . $e->getMessage();

                return false;
            }

        }

    }