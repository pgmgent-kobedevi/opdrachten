<?php
    // load data
    $data = json_decode(file_get_contents("data/articles.json"), true);
    $title= $data[pathinfo($page)["filename"]]["title"];
?>
<a href="detail.php?page=<?php echo pathinfo($page)["basename"] ?>" class="article-item">
    <img src="images/<?php echo $data[pathinfo($page)["filename"]]["photo"] ?>">
    <h3><?php echo $title ?></h3>
</a>