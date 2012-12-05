<?php
// TODO : learning class refencence in PHP.

// first class : ConfigMgr.
// this shit need to parse data from text file
// in this folder for example shit.d
// include helper function
/*
	and now ConfigMgr, ContentMgr, ErrorMgr
	this classes is make easy coding with php, just for me, no one else ;)
	
	ok. functions.php is helper functions with fast using class.
	we can get class with $some_link = new ClassName();
	but now we can just use $some_link=classname();
	i think its a better, i may wrong
	
	TODO : yoda master thinking about best way : 
	need to place ErrorMgr in ErrorMgr.php
	ContentMgr to ContentMgr.php
	ConfigMgr to ConfigMgr.php
	etc ...
	
	
*/
include 'functions.php';
class ErrorMgr {
public function mysql_die($input){

}
public function need_install(bool $yes){
switch (yes){
case true:
echo "test";
case false:
break;
default:
break;
}
}
}
class CongifMgr{

private $host, $user, $pass;
public $limit_lines;

public function __construct (){

$config_file = parse_ini_file ('shit.d', true); 
$this->host=$config_file['server_config']['server'];
$this->user=$config_file['server_config']['user'];
$this->pass=$config_file['server_config']['pass'];
$this->limit_lines=$config_file['site_config']['limit_lines'];
}
public function mysql_connection($database){
if (!mysql_connect ($this->host, $this->user, $this->pass)) 
die ('master yoda not working today');
mysql_select_db($database);
}
}

class ContentMgr{
public $current_page; 
public function get_page($page)
{
if (!$page)
$this->write_main();
else
{
switch ($page)
{
case 'check' :
$this->write_check();
break;
}
}
}
public function next_page((int)$curr_page){

if (!$curr_page || $curr_page<=0)
$curr_page=1;
$next_page=$curr_page+1;
echo "<a href=index.php?p=".$next_page.">test</a>";
}
public function write_main(){
$conf=configurate();
index_top();
// TODO : kill this shit
$mysql_query = "SELECT * FROM price LIMIT 0, $conf->limit_lines";
$result=mysql_query($mysql_query);

while($row=mysql_fetch_array($result)){
 echo "<tr>";
 $this->write_td($row[name]);
 $this->write_td($row[kolvo]);
 $this->write_td($row[price_opt]);
 $this->write_td($row[price_roz]);
 $this->write_td($row[garant]);
 $this->write_td($row[serial]);
 $this->write_td("<input type=checkbox name=box[] value=$row[id]>");
 echo "</tr>";


 }

echo '<input type=submit name=multipay value=ѕечать>';
// for here
}
public function install(){
echo "≈сли вы видите это сообщение, то вы запустили приложение в первый раз<br>";
echo "сейчас мы выполним все необходимые операции по конфигурированию";
}
public function write_td($row){
echo "<td>$row</td>";
}

public function write_check (){
if (!$_POST[box])
die ('haxx0rz');
$box  = $_POST['box'];
$count = count($box); 
if (!$count)
die ('haxx0rz');
$conf=configurate();
check_top();
for ($i = 0; $i < $count; $i++) {
$query="SELECT * FROM price WHERE id=$box[$i]";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
echo "<tr>";
$this->write_td($row[name]);
$this->write_td($row[price_roz]);
$this->write_td($row[garant]);
$this->write_td($row[serial]);
echo "</tr>";
}
}
check_bottom();
}
}
?>
