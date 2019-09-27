<?php
include 'db.php';

//initializing chat data on page render
$users = getAll();
$message = getMessage();
?>
<!DOCTYPE html>

<html>
<head>
    <title>Chat Test</title>
    <link rel="stylesheet" href="styles.css" media="all">
    <script>

        function poll() {
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('chat').innerHTML = this.responseText;
                    poll();
                }
            };
            ajax.open('GET', 'chat_log.php', true);
            ajax.send();
        }
        poll();

    </script>
</head>
<body>

<div id="container">
    <div id="chat_box">
        <div id="chat"></div>
    </div>

    <form method="post" action="index.php">
        <input type="text" name="name" placeholder="enter name">
        <textarea name="message" placeholder="enter message"></textarea>
        <input type="submit" name="submit" value="Send it">
    </form>
</div>
</body>
</html>
