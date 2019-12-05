<?php

class Message {


    public function __construct() {
        
    }

    // public static function byId($message_id){
    //     global $db;

    //     $sql = "SELECT * FROM message WHERE message_id = :message_id";

    //     $sth = $db->prepare($sql);
    //     $sth->execute([
    //         ':message_id' => $message_id
    //     ]);

    //     return $sth->fetchObject();
    // }

    public static function all($tag_id){
        global $db;

        if($tag_id) {
            $sql = "SELECT messages.*, users.* FROM messages
                    INNER JOIN messages_has_tags ON messages_has_tags.message_id = messages.message_id 
                    INNER JOIN users ON messages.user_id = users.user_id
                    WHERE messages_has_tags.tag_id = :tag_id 
                    ORDER BY message_id DESC";

            $sth = $db->prepare($sql);
            $sth->execute([
                "tag_id" => $tag_id
            ]);
        } else {
            $sql = "SELECT * FROM messages
                    INNER JOIN users ON messages.user_id = users.user_id 
                    ORDER BY message_id DESC";

            $sth = $db->prepare($sql);
            $sth->execute([
            ]);
        }

        return $sth->fetchAll();
    }

}