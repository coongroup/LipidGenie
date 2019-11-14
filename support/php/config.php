<?php
	$host = 'database_location_here';
	$db   = 'database_name_here';
	$username = 'database_user_account_here';
	$password = 'database_user_password_here';
	$charset = 'utf8';
	
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH,
			PDO::ATTR_EMULATE_PREPARES   => false
	];
	$pdo = new PDO($dsn, $username, $password, $opt);
	$supportFolder = "../support/";
?>