<?php
$json_config = [];
$json_config_path = './../milega.config.json';
if(file_exists($json_config_path)){
  $string = file_get_contents($json_config_path);
  $json_config = json_decode($string, true);
}
define('_TOKEN_ENCRYPTION_ALG_', $json_config['TOKEN_ENCRYPTION_ALG'] ?? 'aes-256-cbc');
define('_TOKEN_ENCRYPTION_KEY_', $json_config['TOKEN_ENCRYPTION_KEY'] ?? 'utUgQiEi9RfVC9QNVXt4qqNdUBdfNSt1LZd4GkjVU13m7Y4MrXOKIaNrNvsplu+fiokQuz3SOTBCJLdwTWkaTA==');
define('_TOKEN_ENCRYPTION_IV_', $json_config['TOKEN_ENCRYPTION_IV'] ?? 'k4ZBxyGeqAfyQWj1wbW2iQ==');

define('_LOCALIZATION_DEFAULT_', $json_config['LOCALIZATION_DEFAULT'] ?? 'swedish');

define('_AUTHENTICATION_TOKEN_LIFETIME_', $json_config['AUTHENTICATION_TOKEN_LIFETIME'] ?? (60 * 60 * 24 * 30));

define('_PDO_DATABASE_', $json_config['PDO_DATABASE'] ?? ['sqlite:db/milega.sqlite']);
