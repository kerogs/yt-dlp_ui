<?php

if (!isset($_POST['url'])) {
    header('Location: download.php');
    exit;
}

// Check if the URL is valid
if (!filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
    header('Location: download.php');
    exit;
}

// Use yt-dlp in /yt-dlp/yt-dlp.exe
$url_ytdlp = "yt-dlp/yt-dlp.exe";

$vid_ytdlp = uniqid();
$output_ytdlp = "data/";

// Check if we can create the directory
while (!mkdir($output_ytdlp . $vid_ytdlp, 0755, true)) {
    $vid_ytdlp = uniqid();
}

$output_ytdlp .= $vid_ytdlp . '/'; // Add a trailing slash for the output directory

// Prepare the command
$cmd_ytdlp = escapeshellcmd($url_ytdlp) . ' -f "bestvideo+bestaudio" --merge-output-format mp4 -o "' . escapeshellarg($output_ytdlp . '%(title)s.%(ext)s') . '" --write-info-json --write-description --write-annotations --write-thumbnail --all-subs ' . escapeshellarg($_POST['url']);

// Execute the command
// exec($cmd_ytdlp, $output, $return_var);
shell_exec($cmd_ytdlp);

// Check if the command was successful
if ($return_var === 0) {
    echo "Download completed successfully.";
} else {
    echo "Error downloading the video.";
}
