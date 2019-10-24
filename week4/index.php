<?php

    if( isset($_POST['save'])) {
        $rows = [];
        foreach($_POST['fields'] as $field) {
            $rows[] = implode(',', $field);
        }
        file_put_contents('./csv/users.csv', implode(PHP_EOL, $rows));
        
    }

    $rows = explode(PHP_EOL, file_get_contents('./csv/users.csv'));

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    table {border-collapse: collapse; }
    tr:nth-child(odd) { background: #EEE;}
    tr td { padding: 5px;  }
    </style>
</head>
<body>
<form method="POST">
<table>
    <?php

    $rows_count = count($rows);
    foreach($rows as $row_id => $row) {
        $colums = explode(',', $row);
        $colums_count = count($colums);

        if($row_id == 0) {
            echo '<tr>';
            foreach($colums as $col_id => $column) {
                echo '<th>' . $column . '<input type="hidden" value="' . $column . '" name="fields[' . $row_id . '][' . $col_id . ']"></th>';
            }
            echo '</tr>';
        }else {
            echo '<tr>';
            foreach($colums as $col_id => $column) {
                echo '<td><input type="text" value="' . $column . '" name="fields[' . $row_id . '][' . $col_id . ']"></td>';
            }
            echo '</tr>';
        }
    }

    echo '<tr>';
    for($col_id = 0; $col_id < $colums_count; $col_id++ ) {
        echo '<td><input type="text" value="" name="fields[' . $rows_count . '][' . $col_id . ']"></td>';
    }
    echo '</tr>';

    ?>
    </table>
    <button type="submit" name="save">Opslaan</button>
</form>
</body>
</html>