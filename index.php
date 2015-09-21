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
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>
        .container {
            margin-bottom: 50px;
            max-width: 640px;
            min-width: 320px;
            width: 100%;
        }

        .password {
            background-color: #eee;
            color: #f39c12;
            display: inline-block;
            font-size: 2em;
            font-weight: 800;
            padding: 15px;
        }

        body {
            font-family: 'PT Sans', sans-serif;
        }

        hr {
            border: 1px solid;
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
            <hr>
<!--
        </div>

        <div data-role="main" class="ui-content">
-->
            <p class="password"><?php echo $PASSWORD?></p>
            <form method="get" action="index.php">
                <input type="submit" value="Generate Password" data-inline="true"/>
                <hr>
                <label for="min_words">Minimum Number of Words:
                </label>
                <input id="min_words" type="range"
                       name="min_words"
                       value="<?php echo $OPTIONS["min_words"]; ?>"
                       min="2" max="9"
                       data-show-value="true"
                       data-popup-enabled="true"
                       data-highlight="true"/>
                <br>
                <label for="num_digits">Number of Digits:</label>
                <input id="num_digits" type="range"
                       name="num_digits"
                       value="<?php echo $OPTIONS["num_digits"]; ?>"
                       min="0" max="3"
                       data-show-value="true"
                       data-popup-enabled="true"
                       data-highlight="true"/>
                <br>
                <label for="num_symbols">Number of Symbols:</label>
                <input id="num_symbols" type="range"
                       name="num_symbols"
                       value="<?php echo $OPTIONS["num_symbols"]; ?>"
                       min="0" max="3"
                       data-show-value="true"
                       data-popup-enabled="true"
                       data-highlight="true"/>
                <br>
                <label for="min_password_length">Minimum Password Length:</label>
                <input id="min_password_length" type="range"
                       name="min_password_length"
                       value="<?php echo $OPTIONS["min_password_length"]; ?>"
                       min="8" max="32"
                       data-show-value="true"
                       data-popup-enabled="true"
                       data-highlight="true"/>
                <br>
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <p>Separator Type:</p>
                    <label for="hyphen">Hyphen</label>
                    <input id="hyphen" type="radio"
                           name="separator"
                           value="-"
                           <?php if ($OPTIONS["separator"] == "-") echo "checked"; ?>/>
                    <label for="plus">Plus</label>
                    <input id="plus" type="radio"
                           name="separator"
                           value="+"
                           <?php if ($OPTIONS["separator"] == "+") echo "checked"; ?>/>
                    <label for="space">Space</label>
                    <input id="space" type="radio"
                           name="separator"
                           value=" "
                           <?php if ($OPTIONS["separator"] == " ") echo "checked"; ?>/>
                </fieldset>
                <br>
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <p>Letter Case:</p>
                    <label for="lower">Lower</label>
                    <input id="lower" type="radio"
                           name="letter_case"
                           value="strtolower"
                           <?php if ($OPTIONS["letter_case"] == "strtolower") echo "checked"; ?>/>
                    <label for="upper">Upper</label>
                    <input id="upper" type="radio"
                           name="letter_case"
                           value="strtoupper"
                           <?php if ($OPTIONS["letter_case"] == "strtoupper") echo "checked"; ?>/>
                    <label for="capitalized">Capitalized</label>
                    <input id="capitalized" type="radio"
                           name="letter_case"
                           value="ucfirst"
                           <?php if ($OPTIONS["letter_case"] == "ucfirst") echo "checked"; ?>/>
                </fieldset>
            </form>
<!--
        </div>

        <div data-role="footer">
-->
            <hr>
<!--
        </div>
    </div>
-->
    </div>
</body>
</html>
