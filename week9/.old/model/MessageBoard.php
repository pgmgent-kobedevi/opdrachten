<?php
require_once "../config.php";

class MessageBoard {
    
    public static function allMessages() {
        global $db;
        
        $sql = "SELECT * from messages inner join users on messages.user_id = users.user_id";

        $sth = $db->prepare($sql);
        $sth->execute([

        ]);
        return $sth->fetchAll();
        $db = null;
    }
}

?>