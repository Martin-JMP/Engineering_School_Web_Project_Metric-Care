<?php
$data = "kERQzPgYHNt2HOZWjxyAHQ==";
$method = "aes-256-cbc";
$key = "secretkeyofmetriccare";
$options = 0;
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));

// Encrypt the data
$encrypted = openssl_encrypt($data, $method, $key, $options, $iv);

// Decrypt the data
$decrypted = openssl_decrypt($data, $method, $key, $options, $iv);

echo "Encrypted: " . $decrypted  ;

?>