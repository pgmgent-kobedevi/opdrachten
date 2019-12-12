<?php

if( ! function_exists('get_olods')) {
    function get_olods(){
        global $db;
        $params = [];
        
        $sql = 'SELECT * FROM olod ORDER BY semester, name';

        $sth = $db->prepare($sql);
        $sth->execute($params);
        $result = $sth->fetchAll();

        return $result;
    }
}
