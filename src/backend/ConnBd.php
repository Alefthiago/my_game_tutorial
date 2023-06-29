<?php 
    class ConnBD {
        private $dbName;
        private $port;
        private $user;
        private $senha;
        private $pdo;
      
        public function __construct() {
          $this->dbName = "projetoepratica";
          $this->port = 3306; // ou 3307 se necessário
          $this->user = "alef";
          $this->senha = "root";
        }
      
        public function getConnection() {
            try {
              $dsn = "mysql:dbname={$this->dbName};host=127.0.0.1;port={$this->port}";
              $this->pdo = new PDO($dsn, $this->user, $this->senha);
              $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
              echo 'Desculpe, houve um erro no servidor. Por favor, tente novamente mais tarde.';
            }
            
            return $this->pdo;
          }          

        public function closeConnection() {
            $this->pdo = null;
        }
      }

      $connBD = new ConnBD();
      