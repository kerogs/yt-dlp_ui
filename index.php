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

        <div class="videoList">

            <?php

            $videos = scandir('./data/');
            foreach ($videos as $video) {
                if ($video === '.' || $video === '..' || $video === '.gitkeep') {
                    continue;
                }

                // nom premier fichier dans le dossier /data/
                $videoContent = scandir('./data/' . $video);
                // récuperer le nom sans ext
                $name = pathinfo($videoContent[2], PATHINFO_FILENAME);

                // récup .info.json fichier
                $info = json_decode(file_get_contents('./data/' . $video . '/' . $name . '.info.json'), true);
                $description = str_replace("\n", "<br>", $info['description']);

                // Encode the image URL
                $image_url = './data/' . $video . '/' . rawurlencode($name . '.webp');

                echo '
        <a href="./video.php?video=' . $video . '">
            <div class="video">
                <div class="img">
                    <img src="' . $image_url . '" alt="">
                </div>
                <div class="descVid">
                    <p class="title">
                        ' . htmlspecialchars($name) . '
                    </p>
                    <p class="descvid">
                        ' . $description . '
                    </p>
                </div>
            </div>
        </a>
    ';
            }

            ?>



        </div>

    </main>

</body>

</html>