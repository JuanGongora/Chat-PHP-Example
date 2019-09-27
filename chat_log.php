<?php

include 'db.php';
//calling the getAll() function to query the users chat data
$users = getAll();
//retrieving the latest message in chat
$message = getMessage();
//iterating over the chat logs to render them
foreach ($users as $key=>$value):
    ?>
    <div id="chat_data">
        <span class="user_name"><?php echo $value['name'];?>:</span>
        <span class="user_text"><?php echo $value['message'];?></span>
        <span class="user_time"><?php echo formatDate($value['date']);?></span>
    </div>
<?php endforeach; ?>
