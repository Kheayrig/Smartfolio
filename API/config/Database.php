<?php

class Database
{
    private $host = "127.0.0.1";
    private $db_name = "users";
    private $username = "root";
    private $password = "";
    public $conn;
    public function __construct($host,$db_name,$username,$password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->password = $password;
        $this->username = $username;
        $this->conn = parent::__construct($host, $username, $password, $db_name);
    }
}