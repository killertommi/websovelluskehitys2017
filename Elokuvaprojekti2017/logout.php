<?php
session_start();
/**
 * Created by PhpStorm.
 * User: henripal
 * Date: 28.11.2017
 * Time: 13.18
 */

require_once('php/config.php');
SSLon();
session_destroy();  //tuhoa sessio!
session_unset();
redirect('index.php'); //siirry kotisivulle
?>
