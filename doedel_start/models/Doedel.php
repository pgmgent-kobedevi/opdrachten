<?php

class Doedel {


    public function __construct() {
        
    }

    public static function byId($code){
        
    }


    public static function get_results($doedel_code){
        global $db;

        $sql = "SELECT * FROM doedel
        WHERE doedel_code = :doedel_code";

        $sth = $db->prepare($sql);

        $sth->execute([
            ':doedel_code' => $doedel_code,
        ]);

        return $sth->FetchObject();
    }

    public static function get_dates($doedel_code){
        global $db;

        $sql = "SELECT * FROM doedel_date
        WHERE doedel_code = :doedel_code";

        $sth = $db->prepare($sql);

        $sth->execute([
            ':doedel_code' => $doedel_code,
        ]);

        return $sth->FetchAll();
    }

    public static function add_votes($doedel_code, $name, $email, $dates) {
        global $db;
        $sql = "INSERT INTO user
        (name, email) VALUES
        (:name, :email)";

        $sth = $db->prepare($sql);
        
        $sth->execute([
            ':name' => $name,
            ':email' => $email,
        ]);

        $user_id = $db->lastInsertId();

        foreach ($dates as $date) {
  
            $sql = 
            "INSERT INTO vote
            (`user_id`,doedel_date_id) VALUES
            (:user_id, :date_id)";

            $sth = $db->prepare($sql);

            $sth->execute([
                ':user_id' => $user_id,
                ':date_id' => $date,
            ]);
        }
    }

    public static function voteResults($doedel_code) {
        global $db;

        $sql = "SELECT doedel_date, count(*) as votes FROM vote 
        INNER JOIN doedel_date on doedel_date.doedel_date_id = vote.doedel_date_id
        WHERE doedel_code = :doedel_code
        GROUP BY vote.doedel_date_id";

        $sth = $db->prepare($sql);
        $sth->execute([
            ':doedel_code' => $doedel_code,
        ]);

        return $sth->FetchAll();
    }
    
    public static function add($name, $description, $dates) {
        global $db;

        $sql= "INSERT INTO doedel
        (doedel_code, name, description, creation_date) VALUES
        (:doedel_code, :name, :description, :creation_date)";

        $sth = $db->prepare($sql);
        $doedel_code = uniqid();
        $sth->execute([
            ':doedel_code' => $doedel_code,
            ':name' => $name,
            ':description' => $description,
            ':creation_date' => date("Y-m-d H:i:s")
        ]);

        foreach($dates as $date) {
            $sql= "INSERT INTO doedel_date
            (doedel_code, doedel_date) VALUES
            (:doedel_code, :doedel_date)";

            $sth = $db->prepare($sql);
            $sth->execute([
                ':doedel_code' => $doedel_code,
                ':doedel_date' => date('Y-m-d H:i:s', strtotime($date))
            ]);
        }
        return $doedel_code;
    }

}