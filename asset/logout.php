<?php
	session_start();
	require('../dbconect_gatch.php');
	$sql = "UPDATE `gatchi_users`
			   SET `login` = 0
			 WHERE `user_id` =?
	       ";

	$data = array($_SESSION['login_user']['user_id']);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}
	session_destroy();
	header('Location: ../gatchpage/LOGIN/gatch_login.php');
	exit();
?>