<!--
<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>
-->
<!DOCTYPE html>
<html>
<head>
    <title>xkcd Password Generator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>
        .container {
            background-color: gainsboro;
            max-width: 640px;
            min-width: 320px;
            width: 100%;
        }

        .password {
            background-color: ghostwhite;
            color: darkorange;
            font-size: 2em;
            font-weight: 800;
            padding: 15px;
            word-wrap: break-word;
        }

        .ui-slider-input {
            pointer-events: none;
        }

        body {
            font-family: 'PT Sans', sans-serif;
            text-align: center;
        }

        hr {
            border: 1px solid;
        }

        img {
            display: block;
            margin: auto;
            width: 100%;
        }
    </style>
    <?php require "logic.php"; ?>
</head>
<body>
    <div class="container">
        <header>
            <h1>xkcd Password Generator</h1>
            <hr>
        </header>
        <div>
            <p class="password"><?php echo $PASSWORD; ?></p>
            <form method="get" action="index.php" data-transition="none">
                <input type="submit" value="Generate Password" data-inline="true"/>
                <hr>
                <label for="min_words">Minimum Number of Words:
                </label>
                <input id="min_words" type="range"
                       name="min_words"
                       value="<?php echo $OPTIONS["min_words"]; ?>"
                       min="2" max="9"
                       data-show-value="false"
                       data-popup-enabled="true"
                       data-highlight="true"/>
                <br>
                <label for="num_digits">Number of Digits:</label>
                <input id="num_digits" type="range"
                       name="num_digits"
                       value="<?php echo $OPTIONS["num_digits"]; ?>"
                       min="0" max="3"
                       data-show-value="false"
                       data-popup-enabled="true"
                       data-highlight="true"/>
                <br>
                <label for="num_symbols">Number of Symbols:</label>
                <input id="num_symbols" type="range"
                       name="num_symbols"
                       value="<?php echo $OPTIONS["num_symbols"]; ?>"
                       min="0" max="3"
                       data-show-value="false"
                       data-popup-enabled="true"
                       data-highlight="true"/>
                <br>
                <label for="min_password_length">Minimum Password Length:</label>
                <input id="min_password_length" type="range"
                       name="min_password_length"
                       value="<?php echo $OPTIONS["min_password_length"]; ?>"
                       min="8" max="32"
                       data-show-value="false"
                       data-popup-enabled="true"
                       data-highlight="true"/>
                <br>
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <p>Separator:</p>
                    <label for="hyphen">&mdash;</label>
                    <input id="hyphen" type="radio"
                           name="separator"
                           value="-"
                           <?php if ($OPTIONS["separator"] == "-") echo "checked"; ?>/>
                    <label for="period">.</label>
                    <input id="period" type="radio"
                           name="separator"
                           value="."
                           <?php if ($OPTIONS["separator"] == ".") echo "checked"; ?>/>
                    <label for="colon">:</label>
                    <input id="colon" type="radio"
                           name="separator"
                           value=":"
                           <?php if ($OPTIONS["separator"] == ":") echo "checked"; ?>/>
                    <label for="space">Space</label>
                    <label for="underscore">__</label>
                    <input id="underscore" type="radio"
                           name="separator"
                           value="_"
                           <?php if ($OPTIONS["separator"] == "_") echo "checked"; ?>/>
                    <input id="space" type="radio"
                           name="separator"
                           value=" "
                           <?php if ($OPTIONS["separator"] == " ") echo "checked"; ?>/>
                    <label for="none">None</label>
                    <input id="none" type="radio"
                           name="separator"
                           value=""
                           <?php if ($OPTIONS["separator"] == "") echo "checked"; ?>/>
                </fieldset>
                <br>
                <fieldset data-role="controlgroup" data-type="horizontal">
                    <p>Letter Case:</p>
                    <label for="lower">lower</label>
                    <input id="lower" type="radio"
                           name="letter_case"
                           value="strtolower"
                           <?php if ($OPTIONS["letter_case"] == "strtolower") echo "checked"; ?>/>
                    <label for="upper">UPPER</label>
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
        </div>
        <footer>
            <hr>
            <p>
                This page generates passwords inspired by the xkcd
                <a href="http://xkcd.com/936/">
                    Password Strength
                </a>
                comic strip.
                <br>
                <a href="http://xkcd.com/936/">
                    <img class="comic" src="http://imgs.xkcd.com/comics/password_strength.png" alt="xkcd password strength">
                </a>
                <br>
                The list of words come from
                <a href="http://www.wordfrequency.info">
                    http://www.wordfrequency.info
                </a>
                .
            </p>
        </footer>
    </div>
</body>
</html>
