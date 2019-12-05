<div class="message-item">
    <div class="avatar">
        <?php echo substr($item->firstname, 0, 1) . substr($item->lastname, 0, 1); ?>
    </div>
    <div class="content">
        <div><strong><a href="/week09/user.php?user_id=<?php echo $item->user_id; ?>"><?php echo $item->firstname . ' ' . $item->lastname; ?></a></strong></div>
    <div><?php echo $item->content; ?></div>
    <div><?php echo $item->date; ?></div>
    </div>
</div>