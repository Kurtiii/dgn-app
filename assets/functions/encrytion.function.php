<?php

// function to encrypt and decrypt a string

function encrypt($plain_text, $password)
{
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    $iv = openssl_random_pseudo_bytes(16);

    $cipher_text = openssl_encrypt($plain_text, $method, $key, OPENSSL_RAW_DATA, $iv);
    $cipher_text = $iv . $cipher_text;

    return base64_encode($cipher_text);
}

function decrypt($cipher_text, $password)
{
    $cipher_text = base64_decode($cipher_text);
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    $iv = substr($cipher_text, 0, 16);

    $plain_text = openssl_decrypt(substr($cipher_text, 16), $method, $key, OPENSSL_RAW_DATA, $iv);

    return $plain_text;
}
