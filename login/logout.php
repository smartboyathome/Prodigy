<?php
if($_COOKIE['Username'] != "")
{
	setcookie("Username", "", time() - 3600);
	$referrer = $_SERVER['HTTP_REFERER'];
	if(!empty($referrer)) header("Location: $referrer");
	else header("Location: /");
}
?>