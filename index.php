<?php

session_start();
$GLOBALS['dbname'] = "group1_db";
$GLOBALS['dbuser'] = "group1";
$GLOBALS['dbhost'] = "localhost";

//------

function dbaccess($sql, &$fields, &$data) {
	$dbname = $GLOBALS['dbname'];
	$dbuser = $GLOBALS['dbuser'];
	$dbhost = $GLOBALS['dbhost'];

	$ans = "";
	if ($dbhost == "" || $dbhost == "localhost") {
		$con_str = "dbname={$dbname} user={$dbuser}";
	} else {
		$con_str = "dbname={$dbname} user={$dbuser} host={$dbhost}";
	}
	$con = pg_connect($con_str);
	if ($con == false) {
		$ans .= "{$php_errormsg}<br>\n";
		return $ans;
	}

	$fields = array();
	$data = array();
	$result = pg_query($con, $sql);
	if ($result == false) {
		$ans .= pg_last_error($con) . "sql = {$sql}<br>\n";
		return $ans;
	}

	$num_rows = pg_num_rows($result);
	$num_cols = pg_num_fields($result);
	for ($i = 0; $i < $num_cols; $i++) {
		$fields[$i] = pg_field_name($result, $i);
	}
	for ($i = 0; $i < $num_cols; $i++) {
		for ($j = 0; $j < $num_rows; $j++) {
			$data[$i][$j] = pg_fetch_result($result, $j, $i);
		}
	}
	pg_free_result($result);
	pg_close($con);
	return $ans;
}

//------

print <<<EOT
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=EUC-JP">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="Fri, 31 Dec 2004 23:59:59 GMT">
<title></title>
</head>
<body>
EOT;

$mode = isset($_REQUEST["mode"])?$_REQUEST["mode"]:"";
$request_userid = isset($_REQUEST["request_userid"])?$_REQUEST["request_userid"]:"";
$request_name = isset($_REQUEST["request_name"])?$_REQUEST["request_name"]:"";
$request_userid = pg_escape_string($request_userid);
$request_name = mb_convert_encoding(pg_escape_string($request_name), "EUC-JP");
$msg = "";

switch ($mode) {

case "register":
	$fields = array();
	$data = array();
	$sql = "insert into users values('{$request_userid}', '{$request_name}')";
	if (($ans = dbaccess($sql, $fields, $data)) != "") {
		$msg .= "<li><font color=\"red\">database operation failed. SQL = {$sql}.</font><br>";
		$msg .= "$ans";
		break;
	}
	break;

case "remove":
	$fields = array();
	$data = array();
	$sql = "delete from users where userid='{$request_userid}'";
	if (($ans = dbaccess($sql, $fields, $data)) != "") {
		$msg .= "<li><font color=\"red\">database operation failed. SQL = {$sql}.</font><br>";
		$msg .= "$ans";
		break;
	}
	break;

case "":
	break;
}

do {
	$fields = array();
	$data = array();
	$sql = "select userid, name from users";
	if (($ans = dbaccess($sql, $fields, $data)) != "") {
		$msg .= "<li><font color=\"red\">database operation failed. SQL = {$sql}.</font><br>";
		$msg .= "$ans";
		break;
	}

	$num_rows = count($data[0]);
	for ($i = 0; $i < $num_rows; $i++) {
		$userid 	= $data[0][$i];
		$name 	= $data[1][$i];
		$src = implode(",", array(
			$userid,
			$name
		));
		$src .= "<br>\r\n";
		$msg .= $src;
	}
} while (0);

print <<<EOT
<ul>
<li><form enctype="multipart/form-data" action={$_SERVER['PHP_SELF']} method="POST">
userid: <input name="request_userid" type="TEXT" value="{$request_userid}">
name: <input name="request_name" type="TEXT" value="{$request_name}">
<input type="submit" name="mode" value="register"><br>
</form>
<li><form enctype="multipart/form-data" action={$_SERVER['PHP_SELF']} method="POST">
userid: <input name="request_userid" type="TEXT" value="{$request_userid}">
<input type="submit" name="mode" value="remove"><br>
</form>
$msg
</ul>
</body>
</html>
EOT;
?>


