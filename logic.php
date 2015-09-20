<?php
// create an xkcd password and save it the global variable PASSWORD
$PASSWORD = createPassword();

/**
 * Returns a password created from words in the file 'words' using the options
 * specified in $_GET request.
 */
function createPassword()
{
    $words = loadWords("words");
    $options = getOptions();
    $password = generatePassword($words, $options);

    return $password;
}

/**
 * Returns an indexed array of words read from $filename.
 */
function loadWords($filename)
{
    $words = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
#    echo "Total Words: ", count($words), "<br>";

    return $words;
}

/**
 * Returns an associative array of options for the password.
 */
function getOptions()
{
    return array(
        "letter_case"         => "strtolower",
        "min_password_length" => 8,
        "max_word_length"     => 9,
        "min_word_length"     => 2,
        "min_words"           => 4,
        "num_digits"          => 1,
        "num_symbols"         => 1,
        "separator"           => "-",
    );
}


/**
 * Returns a password from the array $words that meets the criteria specified in
 * $options.
 */
function generatePassword($words, $options)
{
    // form the password (words -> digits -> symbols)
    $password = "";

    // add words to the password until the min_words and min_password_length
    // criteria are met
    $i = 0;
    while ($i < $options["min_words"] ||
           strlen($password) < $options["min_password_length"])
    {
        // append a separator if not the first word
        if ($i != 0)
        {
            $password .= $options["separator"];
        }

        // append word
        $password .= generateWord($words, $options);

        // iterate to next word
        $i++;
    }

    return $password;
}

/**
 * Returns a random word from the array $words that meets the criteria specified
 * in $options.
 */
function generateWord($words, $options)
{
    // while criteria is not met, keep selecting random words
    $is_criteria_met = FALSE;
    while (!$is_criteria_met)
    {
        // select a random word from the array $words
        $word = $words[array_rand($words)];

        // check if the word meets the criteria
        $is_criteria_met =
            // check min_word_length
            strlen($word) >= $options["min_word_length"] &&
            // check max_word_length
            strlen($word) <= $options["max_word_length"];
    }

    // apply the "letter_case" function to the word
    $word = $options["letter_case"]($word);

    return $word;
}
?>
