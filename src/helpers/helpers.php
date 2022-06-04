<?php

function dd($value, $die = true)
{
    var_dump($value);
    if ($die)
        exit();
}


function html($text)
{
    return html_entity_decode($text);
}



function currentDomain()
{
    $httpProtocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") ? "https://" : "http://";
    $currentUrl = $_SERVER['HTTP_HOST'];
    return $httpProtocol . $currentUrl;
}

function redirect($url)
{
    $url = trim($url, '/ ');
    $url = strpos($url, currentDomain()) === 0 ?  $url : currentDomain() . '/' . $url;
    header("Location: " . $url);
    exit;
}

function back()
{
    $http_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
    redirect($http_referer);
}

function asset($src)
{
    return currentDomain() . ("/" . trim($src, "/ "));
}

function url($url)
{
    return currentDomain() . ("/" . trim($url, "/ "));
}




function generateToken()
{
    return bin2hex(openssl_random_pseudo_bytes(32));
}




function array_dot($array, $return_array = array(), $return_key = '')
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $return_array = array_merge($return_array, array_dot($value, $return_array, $return_key . $key . '.'));
        } else {
            $return_array[$return_key . $key] = $value;
        }
    }
    return $return_array;
}


function currentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}
