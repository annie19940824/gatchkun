<?php
// 仕様変更により使われません

// AJAXで飛ばすから require('../dbconnect.php'); が必要
session_start();
require('../dbconect_gatch.php');
	$sql ='UPDATE `gatchi_users`
    	   SET    `conditions` =?
		   WHERE `user_id` =?
	';

	$data = array($_POST['login_condition'], $_POST['login_id']);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$_SESSION['login_user']['conditions']=$_POST['login_condition'];
?>