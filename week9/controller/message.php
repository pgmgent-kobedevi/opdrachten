<?php

function loadMessage(array $items) {
    ?>
    <div class="messages">
    <?php
        foreach ($items as $key => $item) {
            include 'view/message_item.php';
        }
    ?>
    </div>
    <?php
}

function messageOverview(array $items){
    loadMessage($items);
}

function splitTag($tags) {
    $mytags = explode(',',$tags);
    return($mytags);
}