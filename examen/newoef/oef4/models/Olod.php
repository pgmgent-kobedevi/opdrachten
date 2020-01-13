<?php

class Olod {


    public function __construct() {
        
    }

    public static function get_results(){
        global $db;

        $sql = "SELECT * from olod";
    
        $sth = $db->prepare($sql);

        $sth->execute([
            
        ]);
        
        return $sth->FetchAll();
    }

    public static function get_submission_results($submission_id){
        global $db;

        $sql = "SELECT * from submission_olod
        inner join olod on olod.olod_id = submission_olod.olod_id
        where submission_id = :submission_id";
    
        $sth = $db->prepare($sql);

        $sth->execute([
            ':submission_id' => $submission_id,
        ]);
        
        return $sth->FetchAll();
    }

    public static function total_results(){
        global $db;

        $sql = "SELECT sum(credits) as studiepunten, sum(contact_hours) as contacturen, sum(study_time) as studietijd from olod";
    
        $sth = $db->prepare($sql);

        $sth->execute([
            
        ]);
        
        return $sth->FetchObject();
    }

    public static function insert($student_id, $olods_id, $realstudy, $wishcontact, $wishstudy){
        global $db;
        // remove spaces from input
        $realstudy = str_replace(' ', '', $realstudy);
        $wishcontact = str_replace(' ', '', $wishcontact);
        $wishstudy = str_replace(' ', '', $wishstudy);
        $student_id = str_replace(' ', '', $student_id);
        if(empty($student_id)) {
            $student_id = NULL;
        }

        $sql = "INSERT into submission (student_id, created_on)
        values (:student_id, now())";
    
        $sth = $db->prepare($sql);

        $sth->execute([
            ':student_id' => $student_id,
        ]);

        $sub_id = $db->lastInsertId();
        
        $i=0;
        foreach ($olods_id as $olod_id) {
            $sql = "INSERT into submission_olod (submission_id, olod_id, real_study_time, wish_contact_hours, wish_study_time)
            values (:submission_id, :olod_id, :real_study_time, :wish_contact_hours, :wish_study_time)";
        
            $sth = $db->prepare($sql);

            $sth->execute([
                ':submission_id' => $sub_id,
                ':olod_id' => $olod_id,
                ':real_study_time' => $realstudy[$i],
                ':wish_contact_hours' => $wishcontact[$i],
                ':wish_study_time' => $wishstudy[$i],
            ]);

            $i++;
        }

        return $sub_id;
    }
}