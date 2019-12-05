<?php 

class User {

    public static function getById($id) {
        global $db;

        $sql = "SELECT * FROM user WHERE user_id = :user_id";

        $sth = $db->prepare($sql);
        $sth->execute([
            ":user_id" => $id,
        ]);
        return $sth->fetchObject();
    }
}