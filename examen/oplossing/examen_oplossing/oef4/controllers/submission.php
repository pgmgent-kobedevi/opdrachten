<?php

if( ! function_exists('get_submission_overview')) {
    function get_submission_overview($submission_id){
        global $db;
        
        $sql = 'SELECT * FROM submission_olod 
                INNER JOIN olod ON submission_olod.olod_id = olod.olod_id 
                WHERE submission_olod.submission_id = :submission_id
                ORDER BY semester, name';

        $params = [':submission_id' => $submission_id];

        $sth = $db->prepare($sql);
        $sth->execute($params);
        $result = $sth->fetchAll();

        return $result;
    }
}
