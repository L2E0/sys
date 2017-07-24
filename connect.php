<?php
$dbname='group1_db';
$dbuser='group1';
$dbhost='localhost';

$con=pg_connect("dbname=group1_db user=group1");
if(!$con){
    die('Ž¸”s'.pg_last_error());
}
echo '¬Œ÷';
pg_set_client_encoding('UTF-8');
$sql='select * from users';
$result = pg_query($sql);
if(!$result){
    die('ƒNƒGƒŠŽ¸”s'.pg_last_error());
}
for($i = 0;$i<pg_num_rows($result);$i++){
    $data = pg_fetch_array($result,NULL,PGSQL_ASSOC);
    echo('id:'.$data['userid'].'<br>');
}

pg_close($con);
?>
