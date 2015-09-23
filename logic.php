<?php
#print_r($_GET);

// load xkcd password criteria options from the $_GET request
$OPTIONS = loadOptions($_GET);

// generate an xkcd password using words from the file 'words' and options from
// the $_GET request
$PASSWORD = generatePassword(loadWords("words"), $OPTIONS);

/**
 * Returns an associative array of options for the password read from
 * $custom_options along with default options not specified.
 */
function loadOptions($custom_options)
{
    // create the default options
    static $options = array(
        "letter_case"         => "strtolower",
        "max_word_length"     => 6,
        "min_password_length" => 12,
        "min_word_length"     => 2,
        "min_words"           => 3,
        "num_digits"          => 1,
        "num_symbols"         => 1,
        "separator"           => "-",
    );

    // override default options with $custom_options
    foreach ($options as $key => &$value)
    {
        // check if the default option exists in $custom_options
        if (isset($custom_options[$key]))
        {
            // override default options if custom option value is valid
            $custom_value = $custom_options[$key];
            if (isOptionValid($key, $custom_value))
            {
                $value = $custom_value;
            }
        }
    }

    // break the reference with the last element
    unset($value);

    return $options;
}

/**
 * Returns whether or not the $value of a given password option $key is valid.
 */
function isOptionValid($key, $value)
{
    $is_option_valid = TRUE;

    // check if letter_case function does not exist
    if ($key == "letter_case" && !function_exists($value))
    {
        $is_option_valid = FALSE;
    }

    // check if min_password_length is not within range
    if ($key == "min_password_length" && (!ctype_digit($value) ||
        $value < 8 || $value > 32))
    {
        $is_option_valid = FALSE;
    }

    // check if min_words is not within range
    if ($key == "min_words" && (!ctype_digit($value) ||
        $value < 2 || $value > 9))
    {
        $is_option_valid = FALSE;
    }

    // check if num_digits is not within range
    if ($key == "num_digits" && (!ctype_digit($value) ||
        $value < 0 || $value > 3))
    {
        $is_option_valid = FALSE;
    }

    // check if num_symbols is not within range
    if ($key == "num_symbols" && (!ctype_digit($value) ||
        $value < 0 || $value > 3))
    {
        $is_option_valid = FALSE;
    }

    // check if separator is not an empty string, whitespace or punctuation
    if ($key == "separator" && !($value === "" ||
        ctype_space($value) || ctype_punct($value)))
    {
        $is_option_valid = FALSE;
    }

    return $is_option_valid;
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
 * Returns a password from the array $words that meets the criteria specified in
 * $options.
 */
function generatePassword($words, $options)
{
    // form the password (words -> digits -> symbols)
    $password = "";

    // append words to the password until the min_words and min_password_length
    // (account for length added by digits and symbols) criteria are met
    $i = 0;
    while ($i < $options["min_words"] ||
           strlen($password) < $options["min_password_length"] -
                               $options["num_digits"] -
                               $options["num_symbols"])
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

    // append num_digits digits to the password
    for ($i = 0; $i < $options["num_digits"]; $i++)
    {
        $password .= generateDigit();
    }

    // append num_symbols symbols to the password
    for ($i = 0; $i < $options["num_symbols"]; $i++)
    {
        $password .= generateSymbol();
    }

    return $password;
}

/**
 * Returns a random word from the array $words that meets the criteria specified
 * in $options.
 */
function generateWord($words, $options)
{
    $word = "";

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

    // apply the letter_case function to the word
    $word = $options["letter_case"]($word);

    return $word;
}

/**
 * Returns a random digit in the range 0-9.
 */
function generateDigit()
{
    return rand(0, 9);
}

/**
 * Returns a special character symbol.
 */
function generateSymbol()
{
    static $symbols = "!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";

    return $symbols[rand(0, strlen($symbols) - 1)];
}
