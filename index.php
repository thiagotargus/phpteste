<?php
include 'functions.php';                   /* defines errorHandler and shutdownHandler function */
// set_error_handler("errorHandler");            /* disable _error_handler when using register_shutdown_function */
/* If  set_error_handler() is enabled WARNIGNS will be missed in our  registered shutdown function*/
register_shutdown_function("shutdownHandler");
ini_set('display_errors', false);               /* Note PHP errors may break the JSON traffic in our AJAX requests */
/* Don't to display any Errors in the Browser Window  */
ini_set('error_reporting', E_ALL);
$handlerType='TOP LEVEL';

echo "<p>____Before Error::</p>";
include 'create_a_php_error.php';                /* The PHP source with an errors */
/* Note we will never reach this line in case of syntax errors in create_a_php_error.php  */
echo "<p>____After Include:: </p>";
runme();                                         /* The function with an error */
echo "<p>____Leaving Page:: </p>";
?>