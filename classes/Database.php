<?php

    class Database{

        private $host = "localhost";
        private $dbname = "cadastro";
        private $username = "root";
        private $password = "";
        private $conn;

        public function getConnection(){
            $this->conn = null;

            try{

                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);

            }catch(PDOException $e){
                die("Erro na conexão: " . $e->getMessage());
            }

            return $this->conn;
        }

    }