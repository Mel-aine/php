<?php
    class Database
    {
        
        public static $instance = null;

        /** @var PDO */
        public $conn;

        /**
         * The builder is private to prevent initiation
         */
        private function __construct()
        {
            try {
    
                // horrible magic variable
                $ipConnexion='localhost';
                $BdName ='Eleve';
                $login = 'root';
                $password ='';
                $this->conn = new PDO('mysql:host=' . $ipConnexion . ';dbname=' . $BdName, $login, $password, [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                ]);
                $this->conn->exec("SET SESSION sql_mode = ''");
                $this->conn->exec("SET SESSION innodb_strict_mode=OFF");
            } catch (PDOException $e) {
                echo "MySql Connection Error: " . $e->getMessage();
            }
        }
    
        /**
         * The object is created from the class itself only if the class has no instance
         * @return Database
         */
        public static function getInstance(): Database
        {
            if (self::$instance === null) {
                self::$instance = new Database();
            }
    
            return self::$instance;
        }
    
        /**
         * Close the connexion
         */
        public function closeConn(): void
        {
            $this->conn = null;
            self::$instance = null;
        }
    
        /**
         * Execute the request
         * @param $sql
         * @param array $parameters
         * @return null|array
         */
        public function execute($sql, array $parameters = []): ?array
        {
            try {
                $req = $this->conn->prepare($sql);
                $req->execute($parameters);
                $result = $req->fetchAll(PDO::FETCH_ASSOC);
                $req = null;
                //remise en place normal
            } catch (Exception $e) {
                echo 'MySQL Exception : '.$e->getMessage();
            }
    
            return $result ?? null;
        }
    
        public function executeCount($sql, $parameters = [])
        {
            $req = $this->conn->prepare($sql);
            $req->execute($parameters);
            return $req->fetchColumn();
        }
    }
    