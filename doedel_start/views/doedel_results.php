<?php 
    require_once '../app.php';  
    $votes = Doedel::voteResults($_GET['doedel_code']);
    $doedel_data = Doedel::get_results($_GET['doedel_code']);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<h2 class="indigo-text text-darken-1"><?php echo $doedel_data->name ?></h2>
<p><?php echo $doedel_data->description ?></p>
        
<div class="collection">
    
    <?php 
    foreach ($votes as $vote) {
        ?>
        <div class="collection-item">
            <span class="new badge" data-badge-caption="votes"><?php echo $vote["votes"] ?></span>
            <?php echo date('Y-m-d H:i:s', strtotime($vote['doedel_date'])) ?>  
        </div>
        <?php
    }
    ?>
</div>