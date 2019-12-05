<?php

function tagOverview(array $items, int $selected = 0) {
    echo '<div class="tags">';
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
    else {
        $user = 0;
    }
    echo '<a href="?'. ($user != 0 ? 'user='. $user .'&' : '') .'tag=0"' . ($selected == 0 ? ' class="active"' : '') . '>Alle</a>';
    foreach ($items as $key => $item) {
        $attr = ($selected == $item['tag_id']) ? ' class="active"' : '';

        echo '<a href="?'. ($user != 0 ? 'user='. $user .'&' : '') .'tag=' . $item['tag_id'] . '"' . $attr . '>' . $item['tagname'] . '</a>';
    }
    echo '</div>';
}