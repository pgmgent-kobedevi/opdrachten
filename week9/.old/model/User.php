<?php
require_once "config.php";

class User {
    
    public function getById($id) {
        global $db;
        
        $sql = "SELECT * from messages inner join users on messages.user_id = users.user_id where users.user_id = :user_id";

        $sth = $db->prepare($sql);
        $sth->execute([
            ":user_id" => $id,
        ]);
        return $sth->fetchAll();
        $db = null;
    }
}

?>