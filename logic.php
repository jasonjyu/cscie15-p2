<?php
// generate an xkcd password and save it the global variable PASSWORD
$PASSWORD = generatePassword();

/**
 * Returns a password generated from words in the file 'words' using the options
 * specified in $_GET request.
 */
function generatePassword()
{
    $words = loadWords("words");
    $options = getOptions();
    $password = createPassword($words, $options);

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
        "letter_case"     => "strtolower",
        "max_word_length" => 30,
        "min_word_length" => 3,
        "num_digits"      => 1,
        "num_symbols"     => 1,
        "num_words"       => 4,
        "separator"       => "-",
    );
}


/**
 * Returns a password from the array $words that meets the criteria specified in
 * $options.
 */
function createPassword($words, $options)
{
    // form password backwards (symbols <- digits <- words) so that
    // the last word can fulfill the min_password_length criterion
    $password = "";

    // prepend words to the password so the digits and symbols are at the end
    for ($i = $options["num_words"] - 1; $i >= 0; $i--)
    {
        $password = getWord($words, $options) . $password;

        // prepend a separator if not the first word
        if ($i != 0)
        {
            $password = $options["separator"] . $password;
        }
    }

    return $password;
}

/**
 * Returns a random word from the array $words that meets the criteria specified
 * in $options.
 */
function getWord($words, $options)
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
