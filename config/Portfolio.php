<?php
require_once "./config/Database.php";
class Portfolio
{
    public static function create($email, $firstName, $lastName, $patronymic, $city, $birtdate, $gender, $phone, $tg_nick, $img, $profession, $salary, $skills, $programs, $exp, $work_place, $education, $about, $achievements) {
        $db = new Database();
        if(count($skills) > 0) $skills_b = implode('$|%',$skills);
        if(count($education) > 0) $education_b = implode('$|%',$education);
        if(count($programs) > 0) $programs_b = implode('$|%',$programs);
        if(count($work_place) > 0) $work_place_b = implode('$|%',$work_place);
        if(count($achievements) > 0) $achievements_b = implode('$|%',$achievements);
        $prep = $db->prepare("INSERT INTO portfolio (email, firstName, lastName, patronymic, city, birtdate, gender, phone, tg_nick, img, profession, salary, skills, programs, exp, work_place, education, about, achievements) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $prep->bind_param('sssssssssssissssss', $email, $firstName, $lastName, $patronymic, $city, $birtdate, $gender, $phone, $tg_nick, $img, $profession, $salary, $skills_b, $programs_b, $exp, $work_place_b, $education_b, $about, $achievements_b);
        $prep->execute();
        $prep->close();
    }
    public static function get($email): array | NULL  {
        $db = new Database();
        $prep = $db->prepare("SELECT * FROM fortfolio WHERE email = ?");
        $prep->bind_param('s', $email);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        if($res === false || $res->num_rows != 1) return NULL;
        return $res->fetch_assoc();
    }
    public static function getByID($id): array | NULL  {
        $db = new Database();
        $prep = $db->prepare("SELECT * FROM fortfolio WHERE id = ?");
        $prep->bind_param('i', $id);
        $prep->execute();
        $res = $prep->get_result();
        $prep->close();
        if($res === false || $res->num_rows != 1) return NULL;
        return $res->fetch_assoc();
    }

}