<?php



function basePath($path = ''){
    return __DIR__ . '/' . $path;
}


/**
 * Dumps information about a variable in a readable format and stops the script.
 *
 * @param mixed $value The variable to inspect
 */
function inspect($value) {
    var_dump($value);
}

/**
 * Dumps  and  exits information about a variable in a readable format and stops the script.
 *
 * @param mixed $value The variable to inspect and die after dumping.
 */
function inspectandDie($value) {
    die(var_dump($value));
}


/**
 * Loads a partial view file if it exists.
 *
 * @param string $name The name of the partial view file (without extension).
 */
function loadPartial($name){
    $partialPath = basePath("App/views/partials/{$name}.php");
    if(file_exists($partialPath)){
        require $partialPath;
    } else {
        echo "Unknown partial path: {$name}";
    }
}





/**
 * Loads a view file if it exists.
 *
 * @param string $name The name of the view file (without extension).
 */
function loadView($name, $data = []){
    $viewpath = basePath("App/views/{$name}.view.php");
    if(file_exists($viewpath)){
        extract($data);
        require $viewpath;
    } else {
        echo "Unknown loadView path: {$name}";
    }
}


// Sanitize function to clean input data
function sanitize($dirty) {
    // Trim whitespace from the beginning and end of the input string
    // Use filter_var to sanitize the string by encoding special characters
    // FILTER_SANITIZE_SPECIAL_CHARS converts special characters to HTML entities
    // This helps prevent XSS (Cross-Site Scripting) attacks
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}
?>
