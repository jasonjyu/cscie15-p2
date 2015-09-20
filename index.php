<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>xkcd Password Generator</title>
	<?php require 'logic.php'; ?>
</head>
<body>
	<h1>xkcd Password Generator</h1>
	<form method='GET' action='index.php'>
		<input type='submit' value='Generate'>
	</form>
    <br>
    <?php echo $PASSWORD?>
</body>
</html>
