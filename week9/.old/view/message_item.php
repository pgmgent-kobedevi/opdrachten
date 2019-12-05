<?php 

require_once 'model/MessageBoard.php';

$messages = MessageBoard::allMessages();
// print_r($messages);

foreach ($messages as $message) {
    ?><div>
        <h1><?php echo $message['firstname'] .' '. $message['lastname']?></h1>
        <p><?php echo $message['content']?></p>
    </div>
    <?php
}