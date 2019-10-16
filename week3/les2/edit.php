<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>edit page</title>
</head>
<body>
<?php 
    require_once 'config.php';

    if(isset($_GET['page'])){
        $currentPage = $_GET['page'];
        $currentContent = file_get_contents($folder.$currentPage);  
    }else{
        $currentPage = "";
        $currentContent="";
    }
    if(isset($_POST['submitBtn'])){
        $changedContent = $_POST['edit'];
        $currentContent = $changedContent;
        file_put_contents($folder.$currentPage, $changedContent);
        echo "file changed";
    }

    if(@$_SESSION['loggedIn']){
        ?>
        <form action="" method="post">
            <textarea name="edit" id="">
                <?php echo $currentContent ?>
            </textarea>
            <input type="submit" name="submitBtn" value="submit changes">
        </form>
        <?php
    }
?>



<a href="index.php?page=<?php echo $currentPage ?>">Return to page</a>

</body>
</html>