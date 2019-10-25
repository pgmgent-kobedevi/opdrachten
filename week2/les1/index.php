<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        // //other way
        // $string_users = file_get_contents('users.csv');
        // // preg_split newline
        // $array_users = explode("/(\r\n|\n|\r)/", $string_users);

        //str_getcsv = parsing string to array
        $csv = array_map('str_getcsv', file('users.csv'));
        ?>
        <form action="" method="post">
        <table>
            <tr>
                <th><?php echo $csv[0][0];?></th>
                <th><?php echo $csv[0][1];?></th>
                <th><?php echo $csv[0][2];?></th>
                <th><?php echo $csv[0][3];?></th>
                <th><?php echo $csv[0][4];?></th>
                <th><?php echo $csv[0][5];?></th>
            </tr>
        <?php
        array_shift($csv);
        $i=0;
        foreach($csv as $person){
            echo '<tr>';
            $j=0;
            foreach($person as $item){
                // echo "<td><input type='text' name='item[".$i."][]' value='".$item."'></td>";
                $j++;
            }
            $i++;
            echo '</tr>';
        }
        ?>
        </table>
        <input type="submit" name="submit" value="submit">
        </form>

        <?php
        //doesn't work yet
            if(isset($_POST['submit'])){
                $new_content="";
                foreach($_POST["item"] as $row){
                    $new_content .= implode(',', $row);
                    $new_content .= "\r";
                }
            }
        ?>
</body>
</html>