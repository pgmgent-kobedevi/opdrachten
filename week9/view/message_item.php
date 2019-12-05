<div class="message-item">
    <div class="avatar">
        <!-- initials -->
        
        <?php 
            echo substr($item['firstname'], 0, 1) . substr($item['lastname'], 0, 1);
            $tag = $_GET['tag'] ?? 0;
        ?>
    </div>
    <div class="content">
        <div><strong><a href="users.php?user=<?php echo $item['user_id'] ?>&tag=<?php echo $tag?>"><?php echo $item['firstname'].' '.$item['lastname'] ?></a></strong></div>
        <div><?php echo $item['content']?></div>
        <div><?php echo $item['date']?></div>
    </div>
</div>