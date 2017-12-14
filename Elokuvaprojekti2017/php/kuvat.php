<?php
$url = "./images/";     //hakee kuvat järjestyksessä images kansiosta
$temp_files = scandir($url);
natsort($temp_files);
foreach($temp_files as $file)
{
    if($file != "." && $file != ".." && $file != basename(__FILE__))
    {
        echo '<img src="'.$url.$file.'" alt="" width="120px" height="110px" style="float:center;" />';
    }
}
?>