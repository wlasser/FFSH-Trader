<?php
function configurate(){
$conf = new CongifMgr();
$conf->mysql_connection('vremonte');
return $conf;
}
function index_top(){
require_once('includes/index_top.php');
}
function check_top(){
require_once ('includes/check_top.php');
}
function check_bottom(){
require_once ('includes/check_bottom.php');
}

?>