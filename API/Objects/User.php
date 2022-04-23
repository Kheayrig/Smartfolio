<?php

class User
{
    private $conn;
    private $table_name = "users";
    //fields
    public $id;
    public $firstName;
    public $lastName;
    public $patronymic;
    public $email;
    public $password;
    public $phone;
    public $gender;
    public $birthdate;


    public function __construct($db){
        $this->conn = $db;
    }
    public function read() {
        return json_encode($this);
    }
    public function checkPwd() {
        $prep = $this->conn->prepare("SELECT hash FROM users WHERE email = ?");
        $prep->bind_param('s', $this->email);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        if($res === false || $res->num_rows != 1) return NULL;
        $hash = $res->fetch_assoc()[0];
        $salt = $this->getSalt();
        if($salt === null) throw new Exception("Something wrong");
        return password_verify($this->password . $salt, $hash);
        return false;
    }
    private function getSalt(): string  | null{
        $prep = $this->conn->prepare("SELECT salt FROM users WHERE email = ?");
        $prep->bind_param('s', $this->email);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        if($res === false || $res->num_rows != 1) return null;
        return $res->fetch_assoc()[0];
    }
    public function checkEmail() {
        $prep = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $prep->bind_param('s', $this->email);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        if($res === false || $res->num_rows != 1) return false;
        return true;
    }
}