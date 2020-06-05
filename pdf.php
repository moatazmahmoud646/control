
<?php
$path = BASE_URL."/pdf/"; 
$filename= $path.basename($_GET['download_file']);

header("Cache-Control: public");
header("Content-Description: File Transfer");
header('Content-disposition: attachment; 
filename='.basename($filename));
header("Content-Type: application/pdf");
header("Content-Transfer-Encoding: binary");
header('Content-Length: '. filesize($filename));
readfile($filename);
fopen($filename);

exit;
?>