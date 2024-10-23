<?php

require_once './inc/core.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YT-DLP UI</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>

    <?php require_once './inc/header.php'; ?>

    <main>

        <div class="ccenter dlvid">
            <form action="./download-send.php" method="post">
                <input type="url" name="url" placeholder="https://www.youtube.com/watch?v=gPhTYvqnt9Q" id="" required pattern="(https://www\.youtube\.com/.*|https://youtu\.be/.*)" >
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M19 9h-4V3H9v6H5l7 8zM4 19h16v2H4z"></path>
                    </svg>
                </button>
            </form>
        </div>

    </main>

</body>

</html>