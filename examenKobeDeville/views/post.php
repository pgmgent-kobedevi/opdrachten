<div class="card">
<img src="images/<?php echo $post->src ?>" alt="birdseye view" class="card-image">
<div class="card-info">
    <h2 class="card-title"><?php echo $post->title ?></h2>
    <span><i class="demo-icon icon-user"></i> <a href="index.php?user_id=<?php echo $post->user_id ?>"><?php echo $post->firstname . ' '. $post->lastname ?></a></span> 
    <span><i class="demo-icon icon-heart"></i><?php echo $likes->likes ?></span>
</div>
<a href="#" class="btn-like"><i class="demo-icon icon-heart-full"></i></a>
</div>