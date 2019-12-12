<?php

if( ! function_exists('get_olods')) {
    function get_olods(){
        global $db;

        $sql = 'SELECT * FROM olod ORDER BY semester, name';

        $sth = $db->prepare($sql);
        $sth->execute([

        ]);
        $result = $sth->FetchAll();
        return $result;
    }
}
