<?php 
    require_once 'app.php';

    if ( isset($_COOKIE["submission_id"]) ) {
        $submission_id = $_COOKIE["submission_id"];
    }else {
        header('Location: ' . SITE_URL . 'index.php');
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo SITE_NAME; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Dosis:300|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/light.css" integrity="sha384-33RmjeesW9BZ4wR2Gm3n4iBXOvGTto4znqL2kZleiRanWDxM59IHIq5RsbRioqxb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-srL3Qh9R/n855m4o5fegS//B2q0R1md7z6ndDYaPj8iEp0j0IuKdFVWMY0JosKPF" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/main.css">
</head>
<body>

<div class="container-full">
    <h2>Bedankt voor uw deelname</h2>
    <p>Uw inzending werd succesvol geregistreerd. Hieronder ziet u een overzicht van uw ingave.</p>
    <p>Uw referentiecode is: <?php echo $submission_id; ?></p>
    
    <table class="table">
        <thead>
            <tr class="header">
                <th colspan="4"></th>
                <th class='real' colspan="2">Reele situatie</th>
                <th class='wish' colspan="2">Gewenste situatie</th>
            </tr>    
            <tr class="header">
                <th>Leereenheid / OLOD</th>
                <th>Semester</th>
                <th>Studiepunten</th>
                <th>Studietijd</th>
                <th class='real'>Contacturen / week</th>
                <th class='real'>Studietijd in gem. aantal uren per week</th>
                <th class='wish'>Contacturen / week</th>
                <th class='wish'>Studietijd in gem. aantal uren per week</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $olods = get_submission_overview($submission_id);
            $total_credits = 0;
            $total_contact_hours = 0;
            $total_study_time = 0;
            $total_real_study_time = 0;
            $total_wish_contact_hours = 0;
            $total_wish_study_time = 0;
            foreach ($olods as $olod) : ?>
                <?php 
                    $total_credits += (int) $olod['credits'];
                    $total_contact_hours += (int) $olod['contact_hours'];
                    $total_study_time += (int) $olod['study_time'];
                    $total_real_study_time += (int) $olod['real_study_time'];
                    $total_wish_contact_hours += (int) $olod['wish_contact_hours'];
                    $total_wish_study_time += (int) $olod['wish_study_time'];
                ?>
                <tr class="list-item">
                    <td><?php echo $olod['name']?></td>
                    <td><?php echo $olod['semester']?></td>
                    <td><?php echo $olod['credits']?></td>
                    <td><?php echo $olod['study_time']?></td>
                    <td class='real'><?php echo $olod['contact_hours']?></td>
                    <td class='real'><?php echo $olod['real_study_time']?></td>
                    <td class='wish'><?php echo $olod['wish_contact_hours']?></td>
                    <td class='wish'><?php echo $olod['wish_study_time']?></td>
                </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr class="footer">
            <td></td>
            <td></td>
            <td><?php echo $total_credits; ?></td>
            <td><?php echo $total_study_time; ?></td>
            <td class='real'><?php echo $total_contact_hours; ?></td>
            <td class='real'><?php echo $total_real_study_time; ?></td>
            <td class='wish'><?php echo $total_wish_contact_hours; ?></td>
            <td class='wish'><?php echo $total_wish_study_time; ?></td>
        </tr>
        </tfoot>
    </table>
</div>

</body>
</html>