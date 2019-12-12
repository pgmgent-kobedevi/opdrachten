<?php

if( ! function_exists('get_submission_overview')) {
    function get_submission_overview($submission_id){
        /*
        TODO: Geef het resultaat terug van de query waarbij je alle ingevulde data teruggeeft adhv submission_id
        Hierbij moeten alle eigenschappen van het olod inzitten.
        */

        global $db;

        $sql = 'select * from submission where submission_olod = :submission_id';

        $sth = $db->prepare($sql);
        $sth->execute([
           ':submission_id' => $submission_id;
        ]);
        $result = $sth->FetchAll();
        return $result;
    }
}
