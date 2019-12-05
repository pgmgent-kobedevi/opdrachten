<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ArteAir</title>
</head>
<body>
    <?php
        $dsn = 'mysql:dbname=arteair;host=127.0.0.1;port=3307';
        $user = "root";
        $password = "";

        $db = new PDO($dsn, $user, $password);
        if(isset($_GET['name'])) {
            $name = $_GET['name'];
        
            //Voorbeeld om delete niet meer toe te laten als SQLInjection
            $name = str_replace('DELETE', 'NOGO', $name);
        }

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $sql = "SELECT * FROM aircraft";

        $sth = $db->prepare($sql);
        $sth->execute([
            
        ]);

        $result_set = $sth->fetchAll();

        echo '<pre>';
        print_r($result_set);
        echo '</pre>';

        //sluit connectie
        $db = null;
        
    ?>
</body>
</html>