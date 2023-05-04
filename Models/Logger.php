<?php


namespace Models;


use Interfaces\LoggerInterface;

class Logger implements LoggerInterface
{

    public function writeLog(string $userString)
    {
        $logFile = 'server.log';
        $time = date('Y-m-d H:i:s');
        $logMessage = "[$time] $userString\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
}