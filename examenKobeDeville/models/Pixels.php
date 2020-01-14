<?php

class Pixels {

    public function __construct() {
        
    }

    // check user credentials
    public static function login($mail, $password){
        global $db;

        $sql = "SELECT * FROM user
        WHERE email = :email AND password = :password";

        $sth = $db->prepare($sql);

        $sth->execute([
            ':email' => $mail,
            ':password' => $password,
        ]);

        return $sth->FetchObject();
    }

    // get all the posts
    public static function getPosts($user_id){
        global $db;

        // if a user id is given, select only those
        if(isset($user_id)){
            $sql = "SELECT photo.*, user.firstname, user.lastname, user.user_id FROM photo
            inner join user on user.user_id = photo.user_id
            where photo.user_id = :user_id";
        }
        // else select all
        else{
            $sql = "SELECT photo.*, user.firstname, user.lastname, user.user_id FROM photo
            inner join user on user.user_id = photo.user_id";
        }

        
        $sth = $db->prepare($sql);

        $sth->execute([
            ':user_id' => $user_id,
        ]);

        return $sth->FetchAll();
    }

    // get the likes from a post
    public static function getLikes($photo_id){
        global $db;

        $sql= "SELECT count(photo_id) as likes from favorite
        where photo_id = :photo_id";

        $sth = $db->prepare($sql);

        $sth->execute([
            ':photo_id' => $photo_id,
        ]);

        return $sth->FetchObject();

    }

    // add a post
    public static function add($userid, $photoname, $title){
        global $db;

        $sql = "INSERT into photo
        (user_id, src, title, upload_date) values
        (:user_id, :src, :title, now())";

        $sth = $db->prepare($sql);

        $sth->execute([
            ':user_id' => $userid,
            ':src' => $photoname,
            ':title' => $title,
        ]);
    }
}