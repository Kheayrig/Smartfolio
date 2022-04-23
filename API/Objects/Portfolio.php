<?php

class Portfolio
{
    private $conn;
    //fields
    public $id;
    public $firstName;
    public $lastName;
    public $patronymic;
    public $email;
    public $birthdate;
    public $gender;
    public $phone;
    public $tg_nick;
    public $img;
    public $city;
    public $profession;
    public $salary;
    public $skills;
    public $programs;
    public $exp;
    public $work_place;
    public $education;
    public $about;
    public $achievements;

    public function __construct($db){
        $this->conn = $db;
    }
    public function Read(){
        return json_encode($this);
    }
    public function create() {
        $prep = $this->conn->prepare("INSERT INTO portfolio (email, firstName, lastName, patronymic, city, birtdate, gender, phone, tg_nick, img, profession, salary, skills, programs, exp, work_place, education, about, achievements) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $prep->bind_param('sssssssssssissssss', $this->email, $this->firstName, $this->lastName, $this->patronymic, $this->city, $this->birtdate, $this->gender, $this->phone, $this->tg_nick, $this->img, $this->profession, $this->salary, $skills_b, $programs_b, $this->exp, $work_place_b, $education_b, $this->about, $achievements_b);
        $prep->execute();
        $prep->close();
        return true;
    }
    public function delete(){
        $prep = $this->conn->prepare("DELETE FROM portfolio WHERE id = ?");
        $prep->bind_param('i', $this->id);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        if($res === false || $res->num_rows != 1) return false;
        return true;
    }
    public function search($email){
        $prep = $this->conn->prepare("SELECT * FROM fortfolio WHERE email = ?");
        $prep->bind_param('s', $email);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        if($res === false || $res->num_rows != 1) return false;
        return $res;
    }
    public function count($email): number {
        $prep = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $prep->bind_param('s', $email);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        return $res->num_rows;
    }
}