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

        public function buscar(){
            
            try{

                $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";

                $stmt_buscar = $this->conn->prepare($query);

                $stmt_buscar->execute([
                    ":id" => $this->id
                ]);

                $busca = $stmt_buscar->fetch(PDO::FETCH_ASSOC);

                if($busca){
                    $this->nome = $busca['nome'];
                    $this->email = $busca['email'];
                    $this->telefone = $busca['telefone'];

                    return true;
                }

                return false;

            }catch(PDOException $e){
                echo "Erro ao buscar o usuario: " . $e->getMessage();
                return false;
            }

        }

        public function atualizar(){

            try{

                $query = "UPDATE " . $this->table_name . " SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";

                $stmt_atualizar = $this->conn->prepare($query);

                $atualizou = $stmt_atualizar->execute([
                    ":nome" => $this->nome,
                    ":email" => $this->email,
                    ":telefone" => $this->telefone,
                    ":id" => $this->id

                ]);

                return $atualizou;

            }catch(PDOException $e){
                die("Erro ao atualizar cadastro: " . $e->getMessage());
            }

        }

    }