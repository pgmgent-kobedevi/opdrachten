<?php

function getMessageOverview(array $items )  {
    echo '<div class="messages">';
    foreach ($items as $key => $item) {
        $item = (object) $item;
        include 'views/message_item.php';
    }
    echo '</div>';
}