<?php



 $link = @mysql_connect('127.0.0.1:3306', 'root', 'MySql');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';


mysql_select_db('database1',$link);

$query="select * from details";
var_dump($query);


$res=mysql_query($query,$link);
var_dump($res);


$data=mysql_fetch_row($res);


mysql_close($link);
?>