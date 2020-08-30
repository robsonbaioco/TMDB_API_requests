<?php

if (!function_exists('getBodyResponse')) {

    function getBodyResponse($response) {
        $body = $response->getBody()->getContents();
        $body = json_decode($body, true);
        return $body;
    }
}

