<?php
    require_once "app.php";
    session_start();
    $search_term = '';
    if( isset($_GET['q']) ) {
        $search_term = $_GET['q'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixels</title>
    <link rel="stylesheet" href="fontello/css/fontello.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php
            include_once 'views/navigatie.php';
        ?>
    </header>
    <section class="cards">

    <?php 
        // if there is filtered on a user
        if(isset($_GET['user_id'])){
            $posts = Pixels::getPosts($_GET['user_id']);
        }
        // if there is not filtered on a user
        else {
            $posts = Pixels::getPosts(NULL);
        }
        // create card
        foreach ($posts as $post) {
            $post = (object) $post;
            // check if there is a filter
            if(!$search_term || strpos(strtolower($post->title), strtolower($search_term)) !== false) {
                // get the post likes
                $likes = Pixels::getLikes($post->photo_id);
                include 'views/post.php';
            }
        }
        ?>
    </section>


<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>