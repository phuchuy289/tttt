<!-- database -->

<?php
    class DB
    {
        private static $instance = NULL;
        private static $host = 'localhost';
        private static $dbname = 'dodientu';
        private static $username = 'root';
        private static $password = '';
        public static function getInstance() {
            if (!isset(self::$instance)) {
                try {
                    self::$instance = new PDO(
                        "mysql:host=" . self::$host . ";dbname=" . self::$dbname,
                        self::$username,
                        self::$password );
                    self::$instance->exec("SET NAMES 'utf8'");
                } catch (PDOException $ex) {
                    die($ex->getMessage());
                }
            }
            return self::$instance;
        }
    }


    
