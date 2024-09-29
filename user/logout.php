<?php
	require_once("../require/session_maintain.php");

	$ob=new Session;
	$ob->destroy_session();

	header('location:../user/index.php?message=Logout Success Full');


?>