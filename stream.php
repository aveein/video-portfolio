<?php
// Serves web videos with HTTP Range support so browsers can play/seek in chunks.
$key = $_GET['f'] ?? '';
if (!preg_match('/^(lfv|trailers|shorts)-\d+$/', $key)) { http_response_code(404); exit; }
$dir  = explode('-', $key)[0];
$path = __DIR__ . "/assets/videos/web/$dir/$key.mp4";
if (!is_file($path)) { http_response_code(404); exit; }

$size = filesize($path);
$start = 0; $end = $size - 1;
header('Content-Type: video/mp4');
header('Accept-Ranges: bytes');
header('Cache-Control: public, max-age=86400');

if (isset($_SERVER['HTTP_RANGE']) && preg_match('/bytes=(\d*)-(\d*)/', $_SERVER['HTTP_RANGE'], $m)) {
    if ($m[1] !== '') { $start = (int)$m[1]; if ($m[2] !== '') $end = min((int)$m[2], $end); }
    elseif ($m[2] !== '') { $start = max(0, $size - (int)$m[2]); }
    if ($start > $end || $start >= $size) { http_response_code(416); header("Content-Range: bytes */$size"); exit; }
    http_response_code(206);
    header("Content-Range: bytes $start-$end/$size");
}
header('Content-Length: ' . ($end - $start + 1));

$fp = fopen($path, 'rb');
fseek($fp, $start);
$left = $end - $start + 1;
while ($left > 0 && !feof($fp) && !connection_aborted()) {
    $chunk = fread($fp, min(262144, $left));   // 256 KB chunks
    echo $chunk; $left -= strlen($chunk); flush();
}
fclose($fp);
