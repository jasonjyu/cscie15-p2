<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>xkcd Password Generator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>
        .container {
            margin-bottom: 50px;
            max-width: 800px;
            min-width: 600px;
            width: 50%;
        }
    </style>
    <?php require "logic.php"; ?>
</head>
<body>
    <div class="container">
<!--
    <div data-role="page">
        <div data-role="header">
-->
            <h1>xkcd Password Generator</h1>
<!--
        </div>

        <div data-role="main" class="ui-content">
-->
            <form method="get" action="index.php">
                <label for="words">Min Words:</label>
                <input type="range" name="words" id="words" value="4" min="2" max="9" data-show-value="true" data-popup-enabled="true" data-highlight="true"/>
                <label for="digits">Num Digits:</label>
                <input type="range" name="digits" id="digits" value="0" min="0" max="3" data-show-value="true" data-popup-enabled="true" data-highlight="true"/>
                <label for="symbols">Num Symbols:</label>
                <input type="range" name="symbols" id="symbols" value="0" min="0" max="3" data-show-value="true" data-popup-enabled="true" data-highlight="true"/>
                <input type="submit" data-inline="true" value="Generate"/>
            </form>
<!--
        </div>

        <div data-role="footer">
-->
            <h3><?php echo $PASSWORD?></h3>
<!--
        </div>
    </div>
-->
    </div>
</body>
</html>
