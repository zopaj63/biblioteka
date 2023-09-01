<?php

    class Database
    {
        private static $instance=null;
        private $conn;


        private function __construct($config)
        {
            $host=$config->get("host", "database");
            $dbname=$config->get("dbname", "database");
            $username=$config->get("username", "database");
            $password=$config->get("password", "database");
        

        try
        {
            $this->conn=new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }
        catch(PDOEXception $e)
        {
            die("Greška prilikom spajanja na bazu ".$e->getMessage());
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance==null)
        {
            self::$instance=new Database($config);
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

?>