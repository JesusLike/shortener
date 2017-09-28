<?php
	require_once("engine/core.php");

	if (isset($_GET['v'])) {
		redirect($_GET['v']);
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shortener</title>
</head>
<body>
	<?php if (!isset($_GET['v'])): ?>
	<form action="engine/shorten.php" method="get">
		<input type="text" name="url" size="50">
		<button type="submit">Shorten!</button>
	</form>
	<?php endif; ?>
</body>
</html>