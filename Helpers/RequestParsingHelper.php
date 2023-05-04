<?php

namespace Helpers;

class RequestParsingHelper
{
    public static function getRequestParts(): array
    {

        $requestParts = [
            'urlParts' => explode('/', trim($_SERVER['REQUEST_URI'], '/')),
            'requestType' => $_SERVER['REQUEST_METHOD'],
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $json = file_get_contents('php://input');
            $body = json_decode($json, true);
            $requestParts['body']= $body;
        }
        return $requestParts;
    }
}