<?php 
    require_once 'app.php';
    /*
    TODO: Indien er een cookie aanwezig met een submission_id: 
    Stuur de gebruiker door naar done.php
    */
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
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>

<div class="container-full">
    <h2>OLODS</h2>
    <p>Vul hieronder het formulier in...</p>
    
    <form method="post" action="opdrachten/examen/oplossing/examen_oplossing/oef4/save_form.php">

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
                $olods = get_olods();
                $total_credits = 0;
                $total_contact_hours = 0;
                $total_study_time = 0;
                
                /*
                TODO: Maak het formulier op aan de hand van onderstaande html code.
                Tel ook de credits, contacturen en studietijd op.
                Let op: je moet bij de input velden nog de correcte name invullen.
                */
                foreach ($olods as $olod) {
                    $olod = (object) $olod;
                    $total_credits += $olod->credits;
                    $total_contact_hours += $olod->contact_hours;
                    $total_study_time += $olod->study_time;
                    ?>
                    <tr class="list-item">
                        <td><?php echo $olod->name ?></td>
                        <td><?php echo $olod->semester ?></td>
                        <td><?php echo $olod->credits ?></td>
                        <td><?php echo $olod->study_time ?></td>
                        <td class='real'><?php echo $olod->contact_hours ?></td>
                        <td class='real'><input type="text" name="<?php echo $olod->olod_id ?>real-study-time"></td>
                        <td class='wish'><input type="text" name="<?php echo $olod->olod_id ?>wish-contact-hours"></td>
                        <td class='wish'><input type="text" name="<?php echo $olod->olod_id ?>wish-study-time"></td>
                    </tr>
                    <?php
                }
                    ?>
            </tbody>
            <tfoot>
                <tr class="">
                    <td></td>
                    <td></td>
                    <td><?php echo $total_credits; ?></td>
                    <td><?php echo $total_study_time; ?></td>
                    <td class='real'><?php echo $total_contact_hours; ?></td>
                    <td class='real'></td>
                    <td class='wish'></td>
                    <td class='wish'></td>
                </tr>
            </tfoot>
        </table>

        <div class="form-item">
            <label>Studentnummer<sup>*</sup></label> <input type="text" name="student_id">
        </div>
        <div class="form-item">
            <label></label>  <small><sup>*</sup>Niet verplicht maar het kan ons helpen bij het maken van een goede analyse</small>

        </div>

        <button type="submit" name="submit_form">Verstuur</button>

    </form>
</div>

</body>
</html>