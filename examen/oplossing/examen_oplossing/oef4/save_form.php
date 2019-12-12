<?php
    require_once 'app.php';
if(isset($_POST['submit_form'])) 
{
    $student_id = (int) $_POST['student_id'];

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try { 
        $db->beginTransaction();

        //run query
        $sql = 'INSERT INTO `submission` 
                (`student_id`, `created_on`)
                VALUES
                (:student_id, :created_on)';

        $sth = $db->prepare($sql);
        $sth->execute([
            ':student_id' => $student_id,
            ':created_on' => date("Y-m-d H:i:s"),
        ]);

        $submission_id = $db->lastInsertId();

        if($submission_id) {
            $sql = 'INSERT INTO `submission_olod` 
                (`submission_id`, `olod_id`, `real_study_time`,  `wish_contact_hours`,  `wish_study_time`)
                VALUES
                (:submission_id, :olod_id, :real_study_time, :wish_contact_hours, :wish_study_time)';

            $sth = $db->prepare($sql);

            foreach($_POST['olod'] as $olod_id => $values) {

                $parameters = [
                    ':submission_id' => $submission_id,
                    ':olod_id' => $olod_id,
                    ':real_study_time' => $values['real_study_time'],
                    ':wish_contact_hours' => $values['wish_contact_hours'],
                    ':wish_study_time' => $values['wish_study_time'],
                ];

                $sth->execute($parameters);
            }

            setcookie('submission_id', $submission_id, time() + 360000);

            header('Location: ' . SITE_URL . 'done.php');

            $db->commit();
        } else {
            echo 'Er is iets foutgelopen';
        }
 
    } catch (Exception $e) {
        $db->rollBack();
        echo "Something went wrong: " . $e->getMessage();
    }

     
}



