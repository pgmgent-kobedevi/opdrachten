<?php
class Tag {
    public static function tagList() {
        global $db;

        $sql = "SELECT * from tags order by tagname";

        $sth = $db->prepare($sql);
        $sth->execute([
            /* add here the :name and set it equal to a passed variable
                example     ':name' => $name */
        ]);

        return $sth->fetchAll();
    }
}