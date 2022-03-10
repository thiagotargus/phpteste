<?php
function runme()
{
    global $handlerType;
    $handlerType ='2nd LEVEL';
    echo "<p><b>function runme():: This function creates a PHP Warning , PHP Runtime Error or PHP Syntax Error ! </b></p>";
    /* Error 3: Syntax error -  throws E_PARSE : this is a fatal error an can only handled in the TOP level PHP page  */
    echo "<p>Leaving function runme - Now dying !</p>";
    die();
}

?>