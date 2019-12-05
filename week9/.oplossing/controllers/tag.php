<?php

function getTagList(array $items, int $selected = 0)  {
    echo '<div class="tags">';
    echo '<a href="?tag=0"' . ($selected == 0 ? ' class="active"' : '') . '>Alle</a>';
    foreach ($items as $key => $item) {
        $item = (object) $item;
        $attr = ($selected == $item->tag_id) ? ' class="active"' : '';

        echo '<a href="?tag=' . $item->tag_id . '"' . $attr . '>' . $item->tagname . '</a>';
    }
    echo '</div>';
}