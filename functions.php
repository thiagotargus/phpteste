<?php

function shutdownHandler()   //will be called when php script ends.
{
    global $handlerType;
    logError(" -------------- Inside shutdownHandler: ".$handlerType." -----------------------", "info");
    $lasterror = error_get_last();
    if ( $lasterror ===  null )
        logError('[SHUTDOWNHANDLER]:: No errors found in PHP Page',"info");
    else
    {
        // logError('[SHUTDOWNHANDLER]:: Found errors found in PHP Page: - Error Type::  '.$lasterror['type'] ,"info");
        switch ($lasterror['type'])
        {
            case E_ERROR:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
            case E_RECOVERABLE_ERROR:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
            case E_PARSE:
                {
                    $error = "[SHUTDOWNHANDLER] lvl:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
                    //  echo '<p><b>'.$error.'</b></p>';
                    logError($error, "fatal");
                    return;
                }
            default:
                {
                    $error = "[SHUTDOWNHANDLER: Unknown Type ] LVL:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
                    logError($error, "fatal");
                    return;
                }
        }
    }
}

function logError($error, $errlvl)
{
    error_log($error);                /* Write to PHP error log */
    echo '<p><b>'.$error.'<b></p>';   /* Display the error in our PHP page */
}

?>