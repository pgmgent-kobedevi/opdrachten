<?php

class Tag {


    public function __construct() {
        
    }

    

    public static function all(){
        global $db;

        $sql = "SELECT * FROM tags ORDER BY tagname"; 

        $sth = $db->prepare($sql);
        $sth->execute([
        ]);

        return $sth->fetchAll();
    }

}