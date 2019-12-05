<?php

class Message {
    // select all messages
    public static function all($tag_id) {
        global $db;

        if($tag_id) {
            $sql = "SELECT messages.*, users.firstname, users.lastname FROM messages 
            INNER JOIN users on messages.user_id = users.user_id
            INNER JOIN messages_has_tags on messages_has_tags.message_id = messages.message_id
            WHERE messages_has_tags.tag_id = :tag_id";

            $sth = $db->prepare($sql);
            $sth->execute([
                /* add here the :name and set it equal to a passed variable
                    example     ':name' => $name */
                ':tag_id' => $tag_id,
            ]);
        }

        else{
            $sql = "SELECT messages.*, users.firstname, users.lastname FROM messages 
            INNER JOIN users on messages.user_id = users.user_id";

            $sth = $db->prepare($sql);
            $sth->execute([
                /* add here the :name and set it equal to a passed variable
                    example     ':name' => $name */
            ]);
        }        

        return $sth->fetchAll();
    }

    // select message by userId
    public static function byUser($user_id, $tag) {
        global $db;

        if($tag) {
            $sql = "SELECT * from messages
            inner join users on users.user_id = messages.user_id
            inner join messages_has_tags on messages_has_tags.message_id = messages.message_id
            where users.user_id = :user_id
            and messages_has_tags.tag_id = :tag_id";

            $sth = $db->prepare($sql);
            $sth->execute([
                ':user_id' => $user_id,
                ':tag_id' => $tag,
            ]);
        }
        else {
            $sql= "SELECT * from messages
            inner join users on users.user_id = messages.user_id
            where users.user_id = :user_id";

            $sth = $db->prepare($sql);
            $sth->execute([
                ':user_id' => $user_id,
            ]);
        }

        return $sth->fetchAll();
    }

    public static function NewMessage($user_id, $content, $tags) {
        global $db;

        $sql = "INSERT INTO `messages` ( `content`, `date`, `user_id`) VALUES (:content, now(), :user_id)";
        $sth = $db->prepare($sql);
        $sth->execute([
            ':user_id' => $user_id,
            ':content' => $content,
        ]);

        $sql = "SELECT message_id from messages where user_id = :user_id and content = :content";
        $sth = $db->prepare($sql);
        $sth->execute([
            ':user_id' => $user_id,
            ':content' => $content,
        ]);

        $message_id = $sth->fetch();

        foreach ($tags as $tag) {
            $id = $message_id['message_id'];
            $sql = "INSERT into messages_has_tags (message_id, tag_id) values($id, $tag)";
            $sth = $db->prepare($sql);
            $sth->execute([
            ]);
        }

        header("location:index.php");
    }
}