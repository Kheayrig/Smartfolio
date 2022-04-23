<?php
require_once "Database.php";
class Portfolio
{
    public static function Create($email, $smt,$smth) {
        $db = new Database();
        $prep = $db->prepare("INSERT INTO portfolio (email, lastName, email, hash, phone) VALUES(?,?,?,?)");
        $prep->bind_param('sssssi', $email, $lastName, $email, $hash, $phone, $rank);
        $prep->execute();
        $prep->close();
    }
    public static function Get($email): array | NULL  {
        $db = new Database();
        $prep = $db->prepare("SELECT * FROM fortfolio WHERE email = ?");
        $prep->bind_param('s', $email);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        if($res === false || $res->num_rows != 1) return NULL;
        return $res->fetch_assoc();
    }

}