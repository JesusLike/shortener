<?php
define(URL_HOST, "shortener/");

define(DB_HOST, "localhost");
define(DB_BASENAME, "Shortener");
define(DB_USERNAME, "test_user");
define(DB_PASS, "database");


function shorten($url) {
	$key = hash("crc32", $url);

	$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_BASENAME);
	//mysqli_query($link, "SET CHARACTER SET utf-8");
	if (mysqli_query($link, "INSERT INTO ShortenedURL VALUES (\"" . $key . "\", \"" . $url . "\")")) {
		echo "Your link: " . URL_HOST . "?v=" . $key;
	} else {
		echo "Failed.";
	}
	mysqli_close($link);
}

function redirect($key) {
	$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_BASENAME);
	//mysqli_query($link, "SET CHARACTER SET utf-8");
	$result = mysqli_query($link, "SELECT url FROM ShortenedURL WHERE hash = \"" . $key . "\"");
	if ($result) {
		$url = mysqli_fetch_row($result)[0];
		header("Location: " . $url . "/");
	} else {
		//echo "Failed.";
	}
	mysqli_close($link);
}


?>